
@if( session()->has('error'))
    <div id="errorMsg" wire:poll.5000ms
         style="padding: 20px 20px 0;"
         x-data="{ show: true }" x-show="show"
         x-init="setTimeout(() => show = false, 5000)">
        <div class="alert alert-danger alert-dismissable" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
            <h4 class="alert-heading font-size-sm my-2">
                <i class="fas fa-info-circle opacity-50 mr-1"></i>
                {{session()->get('error')}}</h4>
        </div>
    </div>
@endif


