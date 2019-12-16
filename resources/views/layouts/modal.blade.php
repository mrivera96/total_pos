<div class="modal fade" id="{{$modal_id ?? ''}}" tabindex="-1" role="dialog" aria-hidden="true">

    <div class="modal-dialog modal-lg" role="document">

        <div class="modal-content">

            <div class="modal-header bg-gradient-warning">
                <h5 class="modal-title">{{$modal_title ?? ''}}</h5>
                <a id="dismiss-create"  href="{{$modal_close_route ?? ''}}" class="close link" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </a>
            </div>

            <div class="modal-body">
                @yield('modal-content')
            </div>

        </div>

    </div>

</div>
