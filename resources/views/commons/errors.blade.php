  @if($errors !== null)
            <ul class="row mt-2">
            @foreach($errors as $error)  
                <li class="text-center col-sm-12">{{ $error }}</li>
            @endforeach
            </ul>
            @endif