
@include('modal-button',[
    "class"     => "btn btn-primary mb-2",
    "target_id" => "setMail",
    "text"      => "Mail Added",
    "icon"      => "fas fa-plus"
])

@include('modal',[
    "id" => "setMail",
    "title" => "Hostname Değiştir",
    "url" => API('set_mail'),
    "inputs" => [
        "Email" => "mail:email"
    ],
    "submit_text" => "Mail Added"
])


<pre id="mail"></pre>
<br>


<script>
        index();
    function index(){
        showSwal('{{__("Yükleniyor...")}}', 'info');
        let data = new FormData();
        request("{{API("set_mail")}}", data, function(response){
            response = JSON.parse(response);
            $('#mail').text(response.message);
            Swal.close();
            $('#setMail').modal('hide')
        }, function(response){
            response = JSON.parse(response);
            showSwal(response.message, 'error');
        });
    }
</script>