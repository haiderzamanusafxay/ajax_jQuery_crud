<!doctype html>
<html lang="en">
  <head>
    <link rel="stylesheet" href="assets/custom.css">
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link href="assets/bootstrap.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/font-awesome.min.css">
    <script src="assets/Popper.js"></script>
    <title>Ajax_Based_Crud</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    
    <style>
      body {
            text-align: center;
        }

        span {
            display: inline-block;
            padding: 10px 20px;
        }

        .icon-green {
            color: green;
            font-size: 20px;
        }

        .icon-red {
            color: red;
            font-size: 20px;
        }

        .icon-large {
            font-size: 25px;
        }

        .icon-blue {
            color: blue;
            font-size: 25px;
        }

        .icon-yellow {
            color: yellow;
            font-size: 25px;
        }  
      #noresult{
        text-align: center;
      }
      th{
        text-align: center;
      }
      td{
        text-align: center;
      }
      #addbtn{
        font-size: 30px;
        color: blue;

      }
    </style>
  </head>
<body>
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">ADD DATA</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" id="clicktoadd">ADD</button>
      </div>
    </div>
  </div>
</div>


<nav class="navbar navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" id="brandtext">SCHOOL MANAGEMENT SYSTEM</a>
    <div class="refresh">Refresh</div>
    <form class="d-flex">
      <input class="form-control me-2" type="search" placeholder="Search Records" aria-label="Search" id='searchbar'>
      <!-- <button class="btn btn-outline-success ml-1" type="submit" id='searched'>Search</button>  -->
    </form>
  </div>
</nav>
<br>
<button type="button" class="btn btn-primary exampleModal" data-bs-toggle="modal" data-bs-target="#exampleModal">
  Launch demo modal
</button>
<br><br>

<table class="table table-sm table-hover table-bordered table-striped">
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

 
    
    <script src="assets/jquery.js"></script>

    <script>
      $(document).ready(function(){
          // on ready of the page the show() function will run 
          show();


          // ajax on click the add button 
            $('.exampleModal').on("click",function(){
              $.ajax({
                method: 'GET',
                url: 'addpage.php',
                success: function(response){
                  $(".modal-body").html(response);
                }
              })
            })

            // search
            var inputdata = $("#searchbar").val();
            if(inputdata = ""){
            show();
            }
            else{
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
          }
            
            // deleting a record 
            $("#delete").on("click",function(){
              deleted();
            })

            $('#clicktoadd').on("click",function(){
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
              // clicktoadd();
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


       // delete user
  $(document).on("click", "#delete", function (e) {
    e.preventDefault();
    var pid = $(this).attr("value");
    if (confirm("Are you sure want to delete "+ pid+" "+ "?")) {
      $.ajax({
        url: "pages/delete.php",
        type: "GET",
        dataType: "json",
        data: { admno: pid},
        success:function(response){
          show();
        }
      });
    }
  });

  // when user click the refresh button it will fetch data from db
  $('.refresh').on('click',function(){
    show();
  })
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

    <script>
      
      
    </script>
</body>
</html>