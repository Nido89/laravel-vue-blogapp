<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
        <title>{{config('app.name','Eximia')}}</title>


    </head>
    <body>
        @include('inc.navbar')
        <div class="container">
            @include('inc.messages')
       @yield('content')
    </div>
    <div id="textarea">
    <script src="https://cdn.ckeditor.com/ckeditor5/19.1.1/classic/ckeditor.js"></script>
  </div>
    <script>
      ClassicEditor
          .create( document.querySelector( 'textarea' ) )
  
          .catch( error => {
              console.error( error );
          } );
       
  </script>

{{--   <!-- TinyMCE Editor -->
  <script src='https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js' referrerpolicy="origin"></script>
  <script>
  tinymce.init({
    selector: 'textarea'
  }); --}}
</script>
    
    
    </body>
</html>
