@if(session('success'))
    <script type="text/javascript">
        iziToast.success({
              title: 'Success',
              message: '{{session('success')}}',
                icon: 'ico-success',
              // iconColor: 'rgb(0, 255, 184)',
              // theme: 'dark',
              // progressBarColor: 'rgb(0, 255, 184)',
              position: 'topCenter',
              transitionIn: 'fadeInLeft',
              transitionOut: 'fadeOutUp'
        });
    </script>
@endif


@if(session('Info'))
    <script type="text/javascript">
        iziToast.info({
              title: 'Note',
              message: '{{session('Info')}}',
              // iconColor: 'rgb(0, 255, 184)',
              // theme: 'dark',
              // progressBarColor: 'rgb(0, 255, 184)',
              position: 'topCenter',
              transitionIn: 'fadeInLeft',
              transitionOut: 'fadeOutUp'
        });
    </script>
@endif

@if(count($errors) > 0)
    @foreach($errors->all() as $error)
        <script type="text/javascript">
            iziToast.error({
                  title: 'Error',
                  message: '{{$error}}',
                    icon: 'ico-warning',
                  // iconColor: 'rgb(0, 255, 184)',
                  // theme: 'dark',
                  // progressBarColor: 'rgb(0, 255, 184)',
                  position: 'topCenter',
                  transitionIn: 'fadeInLeft',
                  transitionOut: 'fadeOutUp'
            });
        </script>
    @endforeach
@endif