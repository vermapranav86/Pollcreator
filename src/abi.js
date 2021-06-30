var abi = [
  {
    "anonymous": false,
    "inputs": [
      {
        "indexed": false,
        "internalType": "uint256",
        "name": "_pollId",
        "type": "uint256"
      }
    ],
    "name": "PollCreated",
    "type": "event"
  },
  {
    "constant": false,
    "inputs": [
      {
        "internalType": "string",
        "name": "_question",
        "type": "string"
      },
      {
        "internalType": "bytes32[]",
        "name": "_options",
        "type": "bytes32[]"
      }
    ],
    "name": "createPoll",
    "outputs": [
      {
        "internalType": "uint256",
        "name": "",
        "type": "uint256"
      }
    ],
    "payable": false,
    "stateMutability": "nonpayable",
    "type": "function"
  },
  {
    "constant": false,
    "inputs": [
      {
        "internalType": "string",
        "name": "_question",
        "type": "string"
      },
      {
        "internalType": "bytes32[]",
        "name": "_options",
        "type": "bytes32[]"
      },
      {
        "internalType": "address[]",
        "name": "_voterlist",
        "type": "address[]"
      }
    ],
    "name": "createPrivatePoll",
    "outputs": [
      {
        "internalType": "uint256",
        "name": "",
        "type": "uint256"
      }
    ],
    "payable": false,
    "stateMutability": "nonpayable",
    "type": "function"
  },
  {
    "constant": true,
    "inputs": [
      {
        "internalType": "uint256",
        "name": "_pollId",
        "type": "uint256"
      }
    ],
    "name": "getPoll",
    "outputs": [
      {
        "internalType": "uint256",
        "name": "",
        "type": "uint256"
      },
      {
        "internalType": "string",
        "name": "",
        "type": "string"
      },
      {
        "internalType": "uint64[]",
        "name": "",
        "type": "uint64[]"
      },
      {
        "internalType": "bytes32[]",
        "name": "",
        "type": "bytes32[]"
      },
      {
        "internalType": "bool",
        "name": "",
        "type": "bool"
      },
      {
        "internalType": "address",
        "name": "",
        "type": "address"
      }
    ],
    "payable": false,
    "stateMutability": "view",
    "type": "function"
  },
  {
    "constant": true,
    "inputs": [
      {
        "internalType": "uint256",
        "name": "_pollId",
        "type": "uint256"
      }
    ],
    "name": "pvgetPoll",
    "outputs": [
      {
        "internalType": "uint256",
        "name": "",
        "type": "uint256"
      },
      {
        "internalType": "string",
        "name": "",
        "type": "string"
      },
      {
        "internalType": "uint64[]",
        "name": "",
        "type": "uint64[]"
      },
      {
        "internalType": "address[]",
        "name": "",
        "type": "address[]"
      },
      {
        "internalType": "bytes32[]",
        "name": "",
        "type": "bytes32[]"
      },
      {
        "internalType": "bool",
        "name": "",
        "type": "bool"
      },
      {
        "internalType": "address",
        "name": "",
        "type": "address"
      }
    ],
    "payable": false,
    "stateMutability": "view",
    "type": "function"
  },
  {
    "constant": false,
    "inputs": [
      {
        "internalType": "uint256",
        "name": "_pollId",
        "type": "uint256"
      }
    ],
    "name": "startstopVoting",
    "outputs": [],
    "payable": false,
    "stateMutability": "nonpayable",
    "type": "function"
  },
  {
    "constant": false,
    "inputs": [
      {
        "internalType": "uint256",
        "name": "_pollId",
        "type": "uint256"
      }
    ],
    "name": "pvstartstopVoting",
    "outputs": [],
    "payable": false,
    "stateMutability": "nonpayable",
    "type": "function"
  },
  {
    "constant": false,
    "inputs": [
      {
        "internalType": "uint256",
        "name": "_pollId",
        "type": "uint256"
      },
      {
        "internalType": "uint64",
        "name": "_vote",
        "type": "uint64"
      }
    ],
    "name": "vote",
    "outputs": [],
    "payable": false,
    "stateMutability": "nonpayable",
    "type": "function"
  },
  {
    "constant": true,
    "inputs": [
      {
        "internalType": "uint256",
        "name": "_pollId",
        "type": "uint256"
      },
      {
        "internalType": "address",
        "name": "voter",
        "type": "address"
      }
    ],
    "name": "isElegible",
    "outputs": [
      {
        "internalType": "bool",
        "name": "",
        "type": "bool"
      }
    ],
    "payable": false,
    "stateMutability": "view",
    "type": "function"
  },
  {
    "constant": false,
    "inputs": [
      {
        "internalType": "uint256",
        "name": "_pollId",
        "type": "uint256"
      },
      {
        "internalType": "uint64",
        "name": "_vote",
        "type": "uint64"
      }
    ],
    "name": "votePrvt",
    "outputs": [],
    "payable": false,
    "stateMutability": "nonpayable",
    "type": "function"
  },
  {
    "constant": true,
    "inputs": [
      {
        "internalType": "address",
        "name": "_id",
        "type": "address"
      }
    ],
    "name": "getVoter",
    "outputs": [
      {
        "internalType": "address",
        "name": "",
        "type": "address"
      },
      {
        "internalType": "uint256[]",
        "name": "",
        "type": "uint256[]"
      }
    ],
    "payable": false,
    "stateMutability": "view",
    "type": "function"
  },
  {
    "constant": true,
    "inputs": [],
    "name": "getTotalPolls",
    "outputs": [
      {
        "internalType": "uint256",
        "name": "",
        "type": "uint256"
      }
    ],
    "payable": false,
    "stateMutability": "view",
    "type": "function"
  },
  {
    "constant": true,
    "inputs": [],
    "name": "pvgetTotalPolls",
    "outputs": [
      {
        "internalType": "uint256",
        "name": "",
        "type": "uint256"
      }
    ],
    "payable": false,
    "stateMutability": "view",
    "type": "function"
  }
];


var contract;
const contractAddress = "0x729cC0D336c23bda1516661e5A1CE698B0fEb28e";


const contractMessage = async (i) => {
  contract = new web3.eth.Contract(abi, contractAddress);
  let message = await contract.methods.getPoll(i).call();
  return message;
 }
 const pvcontractMessage = async (i) => {
  contract = new web3.eth.Contract(abi, contractAddress);
  let message = await contract.methods.pvgetPoll(i).call();
  return message;
 }

 
 const pollcount = async () => {
  contract = new web3.eth.Contract(abi, contractAddress);
  let count = await contract.methods.getTotalPolls().call();
  return count;
 }

 const pvpollcount = async () => {
  contract = new web3.eth.Contract(abi, contractAddress);
  let count = await contract.methods.pvgetTotalPolls().call();
  return count;
 }


 let getAccount =  function () {

  return web3.eth.getAccounts().then((accounts)=> accounts[0]||' ');

}

const iselegible = async (pid,acc) => {

  contract = new web3.eth.Contract(abi, contractAddress);
  let message = await contract.methods.isElegible(pid,acc).call();
  return message;
}


  window.addEventListener('load', async () => {

     
      
    
    
    
    
// Function for create poll page 
      $("#button2").click(async function() {
        const account = await getAccount();
        contract = new web3.eth.Contract(abi, contractAddress);
       
        var options=[]
        options.push(  $("#op1").val());
        options.push(  $("#op2").val());
        

          if (op_count >= 3) {
            options.push(  $("#op3").val());
          }

          if (op_count >= 4) {
            options.push(  $("#op4").val());
          }
        console.log(options);
        var bytops=options.map( web3.utils.fromAscii);
        console.log($("#Question").val()+ ""+$("#op1").val());
        var count=await pollcount();
        if(acc===account){
        contract.methods.createPoll($("#Question").val(), bytops).send({from:account}).then(function(result){
           
        window.location.href="createpoll.php?ptype=poll&pid="+count+"&ques="+$("#Question").val();
      
         });
        }
        else{
alert("Connect Address linked to this Platform")
        }
    });


    $("#button3").click(async function() {
      const account = await getAccount();
      contract = new web3.eth.Contract(abi, contractAddress);
     
      var options=[]
      options.push(  $("#pvop1").val());
      options.push(  $("#pvop2").val());
      

        if (pvop_count >= 3) {
          options.push(  $("#pvop3").val());
        }

        if (pvop_count >= 4) {
          options.push(  $("#pvop4").val());
        }
      console.log(options);
      var bytops=options.map( web3.utils.fromAscii);
      console.log($("#pvQuestion").val()+ ""+$("#pvop1").val());
     var voterlist= $("#voterlist").val().split(",");
     console.log(voterlist);
     
      var count=await pvpollcount();
      if(acc===account){
      contract.methods.createPrivatePoll($("#pvQuestion").val(), bytops, voterlist).send({from:account}).then(function(result){
         
        window.location.href="createpoll.php?ptype=pvpoll&pid="+count+"&ques="+$("#pvQuestion").val()+"&voterlist="+voterlist;
    
       });
      }
      else{  alert("Connect Address linked to this Platform")
      }
      
  });

     
      
       
    // code to connect with metamask...........
 
    let web3Provider=null;
    if (window.ethereum) {
        web3Provider = window.ethereum;
      try {
       
        await window.ethereum.enable();
        
      } catch (error) {
       
        console.error("User denied account access")
      }
    }
    else if (window.web3) {
          web3Provider = window.web3.currentProvider;
        }
       
        else {
          web3Provider = new Web3.providers.HttpProvider('http://localhost:7545');
        }
        web3 = new Web3(web3Provider);
  
        

    

    });