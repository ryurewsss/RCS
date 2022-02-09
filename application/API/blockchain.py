import datetime
import json
import hashlib
from flask import Flask , jsonify, request
class Blockchain:
    def __init__(self):
        #เก็บกลุ่มของ Block
        self.chain = [] #list ที่เก็บ block
        self.transaction_id = 0 
        self.car_id = 0
        self.user_lessor_id = 0
        self.user_rental_id = 0
        self.user_doc_id = 0
        self.place_id = 0
        self.transaction_receive_date = 0
        self.transaction_return_date = 0
        self.transaction_status = 0
        self.transaction_price = 0
        self.transaction_lessor_approve = 0
        self.transaction_rental_approve = 0
        self.transaction_image = 0
        self.transaction_iden_approve = 0
        self.transaction_transfer_approve = 0
        self.transaction_reject_iden = 0
        self.transaction_reject_transfer = 0
        #genesis block
        self.create_block(nonce=1,previous_hash="0")
    
    #สร้าง Block ขึ้นมาในระบบ Blockchain
    def create_block(self,nonce,previous_hash):
        #เก็บส่วนประกอบของ Block แต่ละ Block
        block={
            "index":len(self.chain)+1,
            "timestamp":str(datetime.datetime.now()),
            "nonce":nonce,
            "data":{
                "transaction_id":self.transaction_id,
                "car_id":self.car_id,
                "user_lessor_id":self.user_lessor_id,
                "user_rental_id":self.user_rental_id,
                "user_doc_id":self.user_doc_id,
                "place_id":self.place_id,
                "transaction_receive_date":self.transaction_receive_date,
                "transaction_return_date":self.transaction_return_date,
                "transaction_status":self.transaction_status,
                "transaction_price":self.transaction_price,
                "transaction_lessor_approve":self.transaction_lessor_approve,
                "transaction_rental_approve":self.transaction_rental_approve,
                "transaction_image":self.transaction_image,
                "transaction_iden_approve":self.transaction_iden_approve,
                "transaction_transfer_approve":self.transaction_transfer_approve,
                "transaction_reject_iden":self.transaction_reject_iden,
                "transaction_reject_transfer":self.transaction_reject_transfer
                },
            "previous_hash":previous_hash
        }
        self.chain.append(block)
        return block
    
    #ให้บริการเกี่ยวกับ Block ก่อนหน้า
    def get_previous_block(self):
        return self.chain[-1]
    
    #เข้ารหัส Block
    def hash(self,block):
        #แปลง python object (dict) =>  json object
        encode_block=json.dumps(block,sort_keys=True).encode()
        #sha-256
        return hashlib.sha256(encode_block).hexdigest()

    def proof_of_work(self,previous_nonce):

        #อยากได้ค่า nonce = ??? ที่ส่งผลให้ได้ target hash => 4 หลักแรก => 0000xxxxxxxxx
        new_nonce=1 #ค่า nonce ที่ต้องการ
        check_proof = False #ตัวแปรที่เช็คค่า nonce ให้ได้ตาม target ที่กำหนด

        #แก้โจทย์ทางคณิตศาสาตร์
        while check_proof is False:
            #เลขฐาน 16 มา 1 ชุด
            hashoperation = hashlib.sha256(str(new_nonce**2 - previous_nonce**2).encode()).hexdigest() #5
            if hashoperation[:4] == "0000":
                check_proof=True
            else:
                new_nonce+=1
        return new_nonce
    
    #ตรวจสอบ Block
    def is_chain_valid(self,chain):
        previous_block = chain[0]
        block_index = 1
        while block_index<len(chain):
            block = chain[block_index] #block ที่ตรวจสอบ

            if block["previous_hash"] !=self.hash(previous_block):
                return False

            previous_nonce = previous_block["nonce"] # nonce block ก่อนหน้า
            nonce = block["nonce"] # nonce ของ block ที่ตรวจสอบ
            hashoperation = hashlib.sha256(str(nonce**2 - previous_nonce**2).encode()).hexdigest() #5

            if hashoperation[:4] != "0000":
                return False
            previous_block=block
            block_index+=1
        return True

    #เอา block ล่าสุดของ Transaction
    def get_last_transaction(self, transaction_id=0):
        
        #แปลงเป็นเชนของ transaction
        last_transaction = list(filter(lambda x:x["data"]["transaction_id"]==transaction_id,self.chain[::-1]))
        #เอา transaction อันล่าสุด
        return last_transaction[0]

#web server
app = Flask(__name__)
#ใช้งาน Blockchain
blockchain = Blockchain()

#routing
@app.route('/')
def hello():
    return "<h1>Hello Blockchain CRS</h1>"

@app.route('/get_chain',methods=["GET"])
def get_chain():
    response={
        "chain":blockchain.chain,
        "length":len(blockchain.chain)
    }
    return jsonify(response),200

@app.route('/get_reverse_chain',methods=["GET"])
def get_reverse_chain():
    response={
        "chain":blockchain.chain[::-1],
        "length":len(blockchain.chain)
    }
    return jsonify(response),200

@app.route('/mining',methods=["GET"])
def mining_block():
    # username = request.args.get('tran')
    blockchain.transaction_id = request.args.get('transaction_id') 
    blockchain.car_id = request.args.get('car_id')
    blockchain.user_rental_id = request.args.get('user_rental_id')
    blockchain.user_doc_id = request.args.get('user_doc_id')
    blockchain.place_id = request.args.get('place_id')
    blockchain.transaction_receive_date = request.args.get('transaction_receive_date')
    blockchain.transaction_return_date = request.args.get('transaction_return_date')
    blockchain.transaction_status = request.args.get('transaction_status')
    blockchain.transaction_price = request.args.get('transaction_price')
    blockchain.transaction_rental_approve = request.args.get('transaction_rental_approve')
    blockchain.transaction_image = request.args.get('transaction_image')
    blockchain.user_create_id = request.args.get('user_create_id')
    blockchain.user_update_id = request.args.get('user_update_id')
    #pow
    previous_block = blockchain.get_previous_block()
    previous_nonce = previous_block["nonce"]
    #nonce
    nonce = blockchain.proof_of_work(previous_nonce)
    #hash block ก่อนหน้า
    previous_hash = blockchain.hash(previous_block)
    #update block ใหม่
    block=blockchain.create_block(nonce,previous_hash)
    response={
        # "message":"Mining Block Complete",
        "index":block["index"],
        "timestamp":block["timestamp"],
        "data":block["data"],
        "nonce":block["nonce"],
        "previous_hash":block["previous_hash"]
    }
    return jsonify(response),200

@app.route('/mining_transaction',methods=["GET"])
def mining_transaction():

    blockchain.transaction_id = request.args.get('transaction_id')

    tranBlock = blockchain.get_last_transaction(request.args.get('transaction_id'))

    if request.args.get('user_lessor_id') is None:
        blockchain.user_lessor_id = tranBlock['data']['user_lessor_id']
    else:
        blockchain.user_lessor_id = request.args.get('user_lessor_id')

    if request.args.get('user_doc_id') is None:
        blockchain.user_doc_id = tranBlock['data']['user_doc_id']
    else:
        blockchain.user_doc_id = request.args.get('user_doc_id')

    if request.args.get('transaction_status') is None:
        blockchain.transaction_status = tranBlock['data']['transaction_status']
    else:
        blockchain.transaction_status = request.args.get('transaction_status')

    if request.args.get('transaction_lessor_approve') is None:
        blockchain.transaction_lessor_approve = tranBlock['data']['transaction_lessor_approve']
    else:
        blockchain.transaction_lessor_approve = request.args.get('transaction_lessor_approve')
    
    if request.args.get('transaction_image') is None:
        blockchain.transaction_image = tranBlock['data']['transaction_image']
    else:
        blockchain.transaction_image = request.args.get('transaction_image')

    if request.args.get('transaction_iden_approve') is None:
        blockchain.transaction_iden_approve = tranBlock['data']['transaction_iden_approve']
    else:
        blockchain.transaction_iden_approve = request.args.get('transaction_iden_approve')
        
    if request.args.get('transaction_transfer_approve') is None:
        blockchain.transaction_transfer_approve = tranBlock['data']['transaction_transfer_approve']
    else:
        blockchain.transaction_transfer_approve = request.args.get('transaction_transfer_approve')

    if request.args.get('transaction_reject_iden') is None:
        blockchain.transaction_reject_iden = tranBlock['data']['transaction_reject_iden']
    else:
        blockchain.transaction_reject_iden = request.args.get('transaction_reject_iden')

    if request.args.get('transaction_reject_transfer') is None:
        blockchain.transaction_reject_transfer = tranBlock['data']['transaction_reject_transfer']
    else:
        blockchain.transaction_reject_transfer = request.args.get('transaction_reject_transfer')

    if request.args.get('user_update_id') is None:
        blockchain.user_update_id = tranBlock['data']['user_update_id']
    else:
        blockchain.user_update_id = request.args.get('user_update_id')

    #pow
    previous_block = blockchain.get_previous_block()
    previous_nonce = previous_block["nonce"]
    #nonce
    nonce = blockchain.proof_of_work(previous_nonce)
    #hash block ก่อนหน้า
    previous_hash = blockchain.hash(previous_block)
    #update block ใหม่
    block=blockchain.create_block(nonce,previous_hash)
    response={
        # "message":"Mining Block Complete",
        "index":block["index"],
        "timestamp":block["timestamp"],
        "data":block["data"],
        "nonce":block["nonce"],
        "previous_hash":block["previous_hash"]
    }
    return jsonify(response),200


@app.route('/is_valid',methods=["GET"])
def is_valid():
    is_valid = blockchain.is_chain_valid(blockchain.chain)
    if is_valid:
        response={"message":"Blockchain Is Valid"}
    else :
        response={"message":"Have Problem , Blockchain Is Not Valid"}
    return jsonify(response),200

@app.route('/get_last_transaction',methods=["GET"])
def get_transaction():

    previous_block = blockchain.get_last_transaction(request.args.get('transaction_id'))
    # response={
    #     "chain":previous_block.chain,
    #     "length":len(previous_block.chain)
    # }
    return jsonify(previous_block),200

#run server
if __name__ =="__main__":
    app.run()