











</section>

</main>



<footer id="footer" class="footer">
    <div class="copyright">
      &copy; Copyright <strong><span>NiceAdmin</span></strong>. All Rights Reserved
    </div>
    <div class="credits">
      <!-- All the links in the footer should remain intact. -->
      <!-- You can delete the links only if you purchased the pro version. -->
      <!-- Licensing information: https://bootstrapmade.com/license/ -->
      <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/ -->
      Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/apexcharts/apexcharts.min.js"></script>

  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/chart.js/chart.umd.js"></script>
  <script src="assets/vendor/echarts/echarts.min.js"></script>
  <script src="assets/vendor/quill/quill.min.js"></script>
  <script src="assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.15.6/xlsx.core.min.js"></script>
 
 <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.5.3/jspdf.min.js"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/3.5.13/jspdf.plugin.autotable.min.js"></script>

 <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/3.5.13/jspdf.plugin.autotable.min.js"></script>
 <script src="https://cdn.jsdelivr.net/npm/jspdf-autotable@3.5.13/dist/jspdf.plugin.autotable.min.js"></script>

 <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.66/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.66/vfs_fonts.js"></script>


<script>
function  capitalize(stri){
 let str = stri;
let capitalized = str.charAt(0).toUpperCase() + str.slice(1);
  return capitalized;
 }
function TotalIncome(EarningArray){
    console.log(EarningArray);
TotalEarningInv=0;
EarningArray.forEach((item)=>{
    console.log(item);
    TotalEarningInv=TotalEarningInv+item
});
return TotalEarningInv;

}
// data to be exported
async   function downloadReport(urlData,type){
       
 const inventory=await fetch("http://localhost/groceryWebsite/api/inventory.php?key=avdfheuw23&invtype="+urlData);
const jsonInventory=await inventory.json();
console.log(inventory);
console.log(jsonInventory);


today=new Date();
console.log(today);
console.log(today.getTime()+1000*60*3);
console.log(new Date(today.getTime()+1000*60*3));
// save the PDF document
const name=today.getMonth()+today.getDate();
data=jsonInventory.data;



if(type==="pdf"){
if(urlData=="monthly"){
var headerPdf= [{ text: 'S.No', style: 'tableHeader' },{ text: 'Month Year', style: 'tableHeader' }, { text: 'Earning', style: 'tableHeader' }];
}else{
 var headerPdf=  [{ text: 'S.No', style: 'tableHeader' },{ text: 'Order Date', style: 'tableHeader' }, { text: 'Earning', style: 'tableHeader' }]
}
TotalEarning=[];
var docDefinition = {

 content: [
   { text:capitalize(urlData)+' Earning Report', style: 'header' ,align:"center"},
   {
     table: {
       headerRows: 1,
       widths: ['*', '*','*'],
       body: [


      headerPdf
       
            
       ,
 
         ...data.map(function (item,index) {
console.log(index+1);


TotalEarning.push(item.Earning);


           IndexPdf=index+1;
         if(urlData=="monthly"){
           return [IndexPdf,item.monthyear,item.Earning];
         }else{
           return [IndexPdf,item.OrderDate,item.Earning];
         }


         })
       ]
 
     }
   },
   { text: 'Total Earning:'+TotalIncome(TotalEarning)+' Rs', style: 'thanks' }
 
 ],
 styles: {
     header: {
        fontSize: 22,
        bold: true,
        alignment: 'center',
        margin: [0, 0, 0, 20]
     },
   }
};

// download the PDF document
pdfMake.createPdf(docDefinition).download(urlData+name+"inventory_report"+".pdf");

}else{

data=jsonInventory.data;


console.log(data);
// create a new workbook object
var wb = XLSX.utils.book_new();

// add the data to a worksheet in the workbook
var ws = XLSX.utils.json_to_sheet(data);
XLSX.utils.book_append_sheet(wb, ws, 'people');

// write the workbook to a binary string
var wbout = XLSX.write(wb, { bookType: 'xlsx', type: 'array' });

// create a download link and trigger a download
var link = document.createElement('a');
link.download = urlData+'.xlsx';
link.href = URL.createObjectURL(new Blob([wbout], { type: 'application/octet-stream' }));
link.click();

}

}
</script>
 <!-- Template Main JS File -->

 <script src="assets/js/main.js"></script>
 <script src="assets/js/jquery.js"></script>
 <script>
 function logout(){
 localStorage.removeItem("id");
 window.location="login.php";
}
</script>
</body>

</html>