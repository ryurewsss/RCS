import datetime
import json
import hashlib
from flask import Flask , jsonify, request
class Blockchain:
    def __init__(self):
        #เก็บกลุ่มของ Block
        self.chain = [] #list ที่เก็บ block
        self.transaction_id = None 
        self.car_id = None
        self.user_lessor_id = None
        self.user_depositor_id = None
        self.user_rental_id = None
        self.user_doc_id = None
        self.place_id = None
        self.transaction_receive_date = None
        self.transaction_return_date = None
        self.transaction_status = None
        self.transaction_price = None
        self.transaction_lessor_approve = None
        self.transaction_image = None
        self.transaction_iden_approve = None
        self.transaction_transfer_approve = None

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
                "user_depositor_id":self.user_depositor_id,
                "user_doc_id":self.user_doc_id,
                "place_id":self.place_id,
                "transaction_receive_date":self.transaction_receive_date,
                "transaction_return_date":self.transaction_return_date,
                "transaction_status":self.transaction_status,
                "transaction_lessor_approve":self.transaction_lessor_approve,
                "transaction_image":self.transaction_image,
                "transaction_iden_approve":self.transaction_iden_approve,
                "transaction_transfer_approve":self.transaction_transfer_approve,
                "transaction_price":self.transaction_price,
                
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

    #เอา block ล่าสุดของ Transaction 1 อัน
    def get_last_transaction(self, transaction_id=0):
        
        #แปลงเป็นเชนของ transaction
        last_transaction = list(filter(lambda x:x["data"]["transaction_id"]==transaction_id,self.chain[::-1]))
        #เอา transaction อันล่าสุด
        return last_transaction[0]
        
        #เอา Transaction หลายๆ แบบ
    def get_transaction(self, type="some", user_id="0", car_id="0"):

        block = self.chain[::-1]
        block = block[:-1]
        returnValue = []
        size=len(block)
        uniqueNames = []
        #เอาเฉพาะ Block สุดท้ายของแต่ละ Transaction
        for i in range(0,size,1):
            if(block[i]["data"]["transaction_id"] not in uniqueNames):
                uniqueNames.append(block[i]["data"]["transaction_id"]) 
                returnValue.append(block[i])

        #แปลงเป็นเชนของ transaction ที่ยังไม่เสร็จสิ้น
        if(type!="all"):
            returnValue = list(filter(lambda x:x["data"]["transaction_status"]!="5",returnValue))

        #เอาของเฉพาะผู้ใช้
        if(user_id!="0"):
            returnValue = list(filter(lambda x:x["data"]["user_rental_id"]==str(user_id),returnValue))

        #เอาเฉพาะรถ
        if(car_id!="0"):
            returnValue = list(filter(lambda x:x["data"]["car_id"]==str(car_id),returnValue))

        return returnValue
        

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

    if request.args.get('user_lessor_id'):
        blockchain.user_lessor_id = request.args.get('user_lessor_id')
    if request.args.get('user_depositor_id'):
        blockchain.user_depositor_id = request.args.get('user_depositor_id')

    blockchain.user_doc_id = request.args.get('user_doc_id')
    blockchain.place_id = request.args.get('place_id')
    blockchain.transaction_receive_date = request.args.get('transaction_receive_date')
    blockchain.transaction_return_date = request.args.get('transaction_return_date')
    blockchain.transaction_status = request.args.get('transaction_status')
    blockchain.transaction_price = request.args.get('transaction_price')
    blockchain.transaction_image = request.args.get('transaction_image')

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
    if request.args.get('user_depositor_id') is None:
        blockchain.user_depositor_id = tranBlock['data']['user_depositor_id']
    else:
        blockchain.user_depositor_id = request.args.get('user_depositor_id')
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
def get_transaction_last():

    previous_block = blockchain.get_last_transaction(request.args.get('transaction_id'))
    # response={
    #     "chain":previous_block.chain,
    #     "length":len(previous_block.chain)
    # }
    return jsonify(previous_block),200

@app.route('/get_chain_lessor',methods=["GET"])
def get_chain_lessor():
    block = blockchain.get_transaction()
    return jsonify(block),200

@app.route('/get_all_tran',methods=["GET"])
def get_all_tran():
    block = blockchain.get_transaction("all")
    return jsonify(block),200

@app.route('/get_user_tran',methods=["GET"])
def get_user_tran():
    block = blockchain.get_transaction("all",request.args.get('user_rental_id'))
    return jsonify(block),200

@app.route('/get_car_tran',methods=["GET"])
def get_car_tran():
    block = blockchain.get_transaction("some","0",request.args.get('car_id'))
    return jsonify(block),200

#run server
if __name__ =="__main__":
    app.run()