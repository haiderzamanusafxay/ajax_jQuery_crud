<!doctype html>
<html lang="en">
  <head>
    <link rel="stylesheet" href="assets/custom.css">
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <!-- <link href="assets/bootstrap.css" rel="stylesheet"> -->
    <title>Ajax_Based_Crud</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <style>
      #noresult{
        text-align: center;
      }
      th{
        text-align: center;
      }
      td{
        text-align: center;
      }
    </style>
  </head>
<body>
<div class="modal" id="myModal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Add Data</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
      <button type="submit" class="btn btn-primary btn-block" id='clicktoadd'>Add</button>
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
      </div>

    </div>
  </div>
</div>

<nav class="navbar navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand">SCHOOL MANAGEMENT SYSTEM</a>
    <form class="d-flex">
      <input class="form-control me-2" type="search" placeholder="Search Records" aria-label="Search" id='searchbar'>
      <!-- <button class="btn btn-outline-success ml-1" type="submit" id='searched'>Search</button>  -->
    </form>
  </div>
</nav>

<br>
<button type="button" id='addbtn' class="btn btn-primary btn-block" data-bs-toggle="modal" data-bs-target="#myModal">
  Add data
</button>
<br><br>

<table class="table table-sm table-hover table-bordered">
  <thead>
    <tr>
      <th scope="col">Adm No</th>
      <th scope="col">Name</th>
      <th scope="col">F.Name</th>
      <th scope="col">Form.B</th>
      <th scope="col">Address</th>
      <th scope="col">Action</th>
    </tr>
  </thead>

  <tbody id='singlerecord'>
  </tbody>

</table>
<div class="div1"></div>


    <!-- Option 1: Bootstrap Bundle with Popper -->
     <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.9.2/umd/popper.min.js" integrity="sha512-2rNj2KJ+D8s1ceNasTIex6z4HWyOnEYLVC3FigGOmyQCZc2eBXKgOxQmo3oKLHyfcj53uz4QMsRCWNbLd32Q1g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js" integrity="sha512-STof4xm1wgkfm7heWqFJVn58Hm3EtS31XFaagaa8VMReCXAkQnJZ+jEy8PCC/iT18dFy95WcExNHFTqLyp72eQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-magnify/0.3.0/js/bootstrap-magnify.min.js" integrity="sha512-n1dSnMZ7YxhSyddGMrwME3dwjFV9KpBYAg8Xlkm19rdSMFEmQ4F4tAVzRETkOP9jljMy5s1+lXlZ/6ktLS0SNg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <script src="assets/jquery.js"></script>

    <script>
      $(document).ready(function(){
          // on ready of the page the show() function will run 
          show();
            $('#addbtn').on("click",function(){
              $.ajax({
                method: 'GET',
                url: 'addpage.php',
                success: function(response){
                  $(".modal-body").html(response);
                }
              })
            })

            // search
            $('#searchbar').on('keyup',function(){
              var searched = $("#searchbar").val();
            $.ajax({
              method: 'post',
              url: 'pages/search.php',
              data: {
                'searched' : searched
              },
              success:function(response){
                
                $('#singlerecord').html(response);
                
              }
            })
            })
            
            // deleting a record 
            $("#delete").on("click",function(){
              deleted();
            })

            $('#clicktoadd').on("click",function(){
              clicktoadd();
            })
            
          
      });

      function clicktoadd(){

        var admno= $("#admno").val();
        var name= $("#name").val();
        var fname= $("#fname").val();
        var formb= $("#formb").val();
        var adress= $("#adress").val();

        $.ajax({
          type: "post",
          url: "phpforadding.php",
          data: {
            'admno': admno,
            'name': name,
            'fname': fname,
            'formb': formb,
            'adress': adress

          },
          success: function (response) {
            // $('.alert-info').html(response);
            show();
          }
        });
      }

      function deleted(){
        var tobedeleted= $("#delete").attr('value');
      $.ajax({
                method: "post",
                url: 'pages/delete.php',
                data: {'tobedeleted':tobedeleted},
                success:function(response){
                  $('#success').html(response);
                  show();
                }
              })
            }
      // creating show function to fetch data from db 
      function show(){
        $.ajax({
            method: 'GET',
            url: 'pages/fetch.php',
            success: function(response){
              $('#singlerecord').html(response);
            }
          })
      }
      
    </script>
</body>
</html>