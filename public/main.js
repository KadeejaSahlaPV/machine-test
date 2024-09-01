 $( function() {
       $( ".datepicker" ).datepicker();

       $(  ".saveEmployee"  ).click(function(){
           var name = $('input[name=name]').val();
           var gender = $('select[name=gender]').val();
           var dob = $('input[name=dob]').val();
           var address = $('textarea[name=address]').val();
           var mobile = $('input[name=mobile]').val();
           var email = $('input[name=email]').val();
           var departmentId = $('select[name=department_id]').val();
           var designationId = $('select[name=designation_id]').val();
           var doj = $('input[name=doj]').val();
           var image = $('input[name=image]').val();

           $.ajax({
            type:'POST',
            url:$('#newModal').attr('save-action'),
            headers: {
                'X-CSRF-TOKEN': $('#newModal').attr('token')},
            data:{
                'name':name,
                'gender':gender,
                'dob':dob,
                'address':address,
                'mobile':mobile,
                'email':email,
                'departmentId':departmentId,
                'designationId':designationId,
                'doj':doj,
                'image':image,
            },
            success:function(response){
                console.log(response);

            }
           });


       })


    } );
