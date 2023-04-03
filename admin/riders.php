<?php include "header.php";





?>
  <main id="main" class="main">
        <?php


         ?>


    <div class="pagetitle">
      <h1>Rider</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item active">Riders</li>
        </ol>
      </nav>
    </div>
    <section class="section dashboard">

<div class="row">
    <div class="col-12">
              <div class="card  overflow-auto">
       

       

         

    
              
                            <!-- End Horizontal Form -->




                <div class="card-body pb-0">
          
        
                  <table class="table table-borderless">
      
                    <thead>
                      <tr>
                        <th scope="col">S.No </th>
                        <th scope="col">Users Name</th>
                       
         
                        <th scope="col">Mobile Number </th>
                        <th scope="col">View </th>
                        <th scope="col">Status</th>
                      </tr>
                    </thead>
                    <tbody  id="users">
             



                  </tbody>


</table>
                  </div>
                 </div>


                </div>
</div>


<?php include "footer.php"?>
<script src="assets/js/constant.js"></script>
<script>


function capitalizeFirstWord(str) {
  return str.split(" ").map(function(word) {
    return word.charAt(0).toUpperCase() + word.slice(1);
  }).join(" ");
}



async  function  displayUsers(){

        
const inventory=await fetch(API_PATH+"riders.php?key=avdfheuw23");
const jsonInventory=await inventory.json();
console.log(jsonInventory);

      var     userData="";
          jsonInventory.data.map((item,key)=>{
          
            if(item.status==1){
              Btn="<button onclick=riderstatus('"+item.id+"','"+item.status+"') class='btn btn-success'>Active</button>";
            }else{
              Btn="<button onclick=riderstatus('"+item.id+"','"+item.status+"') class='btn btn-danger'>Deactive</button>";
            }
           userData+="<tr>";
           userData+="<td>"+(key+1)+"</td>";
           userData+="<td>"+capitalizeFirstWord(item.username)+"</td>";
           userData+="<td>"+item.mobile+"</td>";
           userData+="<td><button onclick=view('"+item.id+"') class='btn btn-primary'>View</button></td>";
    

           userData+="<td>"+Btn+"</td>";
           userData+="</tr>";
          });
         document.getElementById("users").innerHTML=userData;
}
displayUsers();

async function riderstatus(rider_id,status){

     if(status==0){
      newStatus=1;
     }else{
      newStatus=0;
     }

     riderObject={
      RiderId:rider_id,
      status:newStatus
     } 

     riderObject=JSON.stringify(riderObject);
rider_data = await fetch(API_PATH+"change_rider.php?key=avdfheuw23",{method:"POST",body:riderObject});
   console.log(await rider_data.text());
displayUsers();
}



</script>