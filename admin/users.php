<?php include "header.php";





?>
  <main id="main" class="main">
        <?php


         ?>


    <div class="pagetitle">
      <h1>Users</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item active">Users</li>
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
                        <th scope="col">Users Email</th>
                        <th scope="col">Users Mobile</th>
                        <th scope="col">Number of  order</th>
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
<script>


function capitalizeFirstWord(str) {
  return str.split(" ").map(function(word) {
    return word.charAt(0).toUpperCase() + word.slice(1);
  }).join(" ");
}



async  function  displayUsers(){

        
const inventory=await fetch("http://localhost/groceryWebsite/api/users.php?key=avdfheuw23");
const jsonInventory=await inventory.json();
console.log(jsonInventory);

      var     userData="";
          jsonInventory.data.map((item,key)=>{
           console.log(item.email);
          if(item.status==1){
            currentStatus="Active";
            badgeColor="btn-success";
          }else{
            currentStatus="Deactive";
            badgeColor="btn-danger";
          }
     
           userData+="<tr>";
           userData+="<td>"+(key+1)+"</td>";
           userData+="<td>"+capitalizeFirstWord(item.username)+"</td>";
           userData+="<td>"+item.email+"</td>";
           userData+="<td>"+item.mobile+"</td>";
           userData+="<td>"+item.number_of_orders+"</td>";
           userData+="<td><span class='btn "+badgeColor+"'  onclick=changeStatus('"+item.user_id+"')   >"+currentStatus+"</span></td>";
           userData+="</tr>";
          });
         document.getElementById("users").innerHTML=userData;
}
displayUsers();


async  function changeStatus(id){
       formData={
        userId:id
       }
   formData  =  JSON.stringify(formData);
   console.log(formData);


  const inventory=await fetch("http://localhost/groceryWebsite/api/change_user.php?key=avdfheuw23",
{

  method:"POST",
  body:formData
});
  const inventoryJSON =await inventory.text();

    console.log(inventoryJSON);
    displayUsers();

}


</script>