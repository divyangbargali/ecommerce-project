
<html>
<body>

        <form>
            <input type="text" name="name" id="name">
            <input type="text" name="email" id="email">
            <input type="button" name="submit" value="submit" class="addwishlist">
        </form>

        <table>
            <tr>
                <td>Name</td>
                <td>Email</td>
            </tr>

            <tr class="table">
            
            </tr>
        </table>
    
       <!-- <button class="addwishlist" data-id="2"> Click me</button>  -->


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script type="text/javascript">

    $(document).ready(function(){

        $('.addwishlist').on('click',function(e){
            let name =    $("#name").val();
            let email =   $("#email").val();
            
            e.preventDefault();
            
        $.ajax({
        type:'POST',
        url:"{{url('/ajax/data/')}}",
        data:{
            myName:name, 
            myEmail:email, 
            somefield: "Some field value", _token: '{{csrf_token()}}'
        },
        dataType:"json",
        success:(response,status,obj) =>{
        console.log(response);
       
     response.forEach(function(info){
         console.log(info.name,info.email);
                $table = `
                        <tr>
                            <td>${info.name}</td>
                            <td>${info.email}</td>
                        </tr>
                `;
                $(".table").append($table);
     })        
     }
    }).fail((obj,status,error)=>{
        console.log(obj,status,error);
    });

 }) 
    });
</script>


</body>
</html>