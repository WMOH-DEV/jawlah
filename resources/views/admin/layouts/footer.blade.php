<footer id="page-footer" class="bg-body-light">
  <div class="content py-0">
    <div class="row font-size-sm">
      <div class="col-sm-6 order-sm-2 mb-1 mb-sm-0 text-center text-sm-left">
          <span>{{ __('global.by_company') }} <a class="font-w600" href="https://www.marslia.com.eg" target="_blank">Marslia </a></span> -
          {{ __('global.made_by') }}
         <a class="font-w600" href="{{ __('global.author_link') }}" target="_blank">
          {{ __('global.author') }}</a>
      </div>
      <div class="col-sm-6 order-sm-1 text-center text-sm-right">
        <a class="font-w600" href="#" target="_blank">{{ __('global.site') }}</a> &copy; <span data-toggle="year-copy"></span>
      </div>
    </div>
  </div>
</footer>
@livewireScripts
<!-- END Footer -->
</div>
@notifyJs
<!-- main JS -->
{{--<script src="https://wmoh-dev.github.io/91_storm_LEGS_later_88/js/ghhez/wmix.core.min.js"></script>--}}
{{--<script src="https://wmoh-dev.github.io/91_storm_LEGS_later_88/js/ghhez/wmix-app.min.js"></script>--}}
<script src="{{ asset('admin/assets/js/dashmix.core.min.js') }}"></script>
<script src="{{ asset('admin/assets/js/dashmix.app.min.js') }}"></script>

<script src="{{asset('admin/assets/js/plugins/nice-select/jquery.nice-select.min.js')}}"></script>
<script src="{{ asset('admin/assets/js/plugins/dropify.js') }}"></script>
<script>
  jQuery(() => {
    if ($("#alertMsg")) {
      $("#alertMsg").delay(6000).slideUp(1500);
    }
      if ($("#sessionMsg")) {
          $("#sessionMsg").delay(6000).slideUp(1500);
      }
      if ($("#errorMsg")) {
          $("#errorMsg").delay(6000).slideUp(1500);
      }

    if (!$('.inset-0')) {
      return;
    }
    $(".inset-0").delay(5000).fadeOut(1000);

    $('.nselect').niceSelect();

  });
</script>
@yield('js')
</body>
</html>
