<h1>{{ __('What\'s up!') }}</h1>
{{ __('Hostname') }}: <span id="hostname"></span><br/>

@include('modal-button',[
    "class"     => "btn btn-primary mb-2",
    "target_id" => "setHostnameModal",
    "text"      => "Mail Added",
    "icon"      => "fas fa-plus"
])

@include('modal',[
    "id" => "setHostnameModal",
    "title" => "Hostname Değiştir",
    "url" => API('set_hostname'),
    "next" => "getHostname",
    "inputs" => [
        "Hostname" => "hostname:text"
    ],
    "submit_text" => "Mail Added",

])

<script>
    getHostname();
    function getHostname(){
        showSwal('{{__("Yükleniyor...")}}', 'info');
        let data = new FormData();
        request("{{API("get_hostname")}}", data, function(response){
            response = JSON.parse(response);
            $('#hostname').text(response.message);
            Swal.close();
            $('#setHostnameModal').modal('hide')
        }, function(response){
            response = JSON.parse(response);
            showSwal(response.message, 'error');
        });
    }
</script>