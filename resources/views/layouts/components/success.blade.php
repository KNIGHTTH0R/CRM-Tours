
@if(session()->get('success'))
    <div class="container">
        <div class="alert alert-success">
            {{ session()->get('success') }}
        </div><br />
@endif