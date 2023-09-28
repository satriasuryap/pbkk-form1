<html lang="en">
  <head>
    <meta charset="UTF-8">
    <title>Pokemon Cards Storage System</title>
        
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">   
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  
    <script src="https://cdnjs.cloudflare.com/ajax/libs/parsley.js/2.9.2/parsley.min.js" integrity="sha512-eyHL1atYNycXNXZMDndxrDhNAegH2BDWt1TmkXJPoGf1WLlNYt08CSjkqF5lnCRmdm3IrkHid8s2jOUY4NIZVQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>


<style>
.form-section{
    display: none;
}

.form-section.current{
    display: inline;
}
.parsley-errors-list{
    color:red;
}

</style>





</head>
  <body>

    <div class="container-fluid  ">
      <div class="row justify-content-md-center">
        <div class="col-md-9 ">
            <div class="card px-5 py-3 mt-5 shadow">
               <h1 class="text-danger text-center mt-3 mb-4">Pokemon Cards Data Systems</h1>

                        <div class="nav nav-fill my-3">
                          <label class="nav-link shadow-sm step0    border ml-2 ">Personal Data</label>
                          <label class="nav-link shadow-sm step1   border ml-2 " >Card Details</label>
                          <label class="nav-link shadow-sm step2   border ml-2 " >Card Images</label>
                        </div>
          
                <form action="/post" method="post" class="employee-form">
                 <?php echo csrf_field(); ?>
                <div class="form-section">
                    <label for="">Name:</label>
                    <input type="text" class="form-control mb-3" name="name" required>
                    <label for="">E-mail:</label>
                    <input type="email" class="form-control mb-3" name="email" required>
                    
                </div>
                <div class="form-section">
                    <label for="">Card Name:</label>
                    <input type="text" class="form-control mb-3" name="last_name" required>
                    <label for="">Ungraded Price:</label>
                    <input type="double" class="form-control mb-3" name="phone"  required>
                </div>
                <div class="form-section">
                    <label for="">Image:</label>
                    <input type="file" class="form-control mb-3" name="address" required></textarea>
                </div>
              <div class="form-navigation mt-3">
                 <button type="button" class="previous btn btn-primary float-left">&lt; Previous</button>
                 <button type="button" class="next btn btn-primary float-right">Next &gt;</button>
                 <button type="submit" class="btn btn-success float-right">Submit</button>
              </div>

            </form>
        </div>
            
        </div>
      </div>
    </div>




<script>

    $(function(){
        var $sections=$('.form-section');

        function navigateTo(index){

            $sections.removeClass('current').eq(index).addClass('current');

            $('.form-navigation .previous').toggle(index>0);
            var atTheEnd = index >= $sections.length - 1;
            $('.form-navigation .next').toggle(!atTheEnd);
            $('.form-navigation [Type=submit]').toggle(atTheEnd);

     
            const step= document.querySelector('.step'+index);
            step.style.backgroundColor="#17a2b8";
            step.style.color="white";



        }

        function curIndex(){

            return $sections.index($sections.filter('.current'));
        }

        $('.form-navigation .previous').click(function(){
            navigateTo(curIndex() - 1);
        });

        $('.form-navigation .next').click(function(){
            $('.employee-form').parsley().whenValidate({
                group:'block-'+curIndex()
            }).done(function(){
                navigateTo(curIndex()+1);
            });

        });

        $sections.each(function(index,section){
            $(section).find(':input').attr('data-parsley-group','block-'+index);
        });


        navigateTo(0);



    });


</script>



  </body>

  <!-- Display the uploaded image -->
<?php if(isset($imagePath)): ?>
    <img src="<?php echo e(asset('storage/' . $imagePath)); ?>" alt="Uploaded Image">
<?php endif; ?>

</html>


<?php /**PATH /Users/arya/Documents/pbkk-form1/resources/views/index.blade.php ENDPATH**/ ?>