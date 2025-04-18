@if (isset($g_setting) && $g_setting->google_analytic_status == 'Show')
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id={{ $g_setting->google_analytic_tracking_id }}"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'UA-84213520-6');
    </script>
@endif


@if (isset($g_setting) && $g_setting->cookie_consent_status == 'Show')
    <script>
        window.addEventListener("load", function() {
            window.cookieconsent.initialise({
                "palette": {
                    "popup": {
                        "background": "#000"
                    },
                    "button": {
                        "background": "#f1d600"
                    }
                },
                "position": "bottom-left"
            })
        });
    </script>
@endif

<!-- All JS -->
<script src="{{ asset('public/frontend/js/cookieconsent.min.js') }}"></script>
<script src="{{ asset('public/frontend/js/jquery-3.5.1.min.js') }}"></script>
<script src="{{ asset('public/frontend/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('public/frontend/js/jquery.magnific-popup.min.js') }}"></script>
<script src="{{ asset('public/frontend/js/owl.carousel.min.js') }}"></script>
<script src="{{ asset('public/frontend/js/wow.min.js') }}"></script>
<script src="{{ asset('public/frontend/js/jquery.meanmenu.js') }}"></script>
<script src="{{ asset('public/frontend/js/waypoints.min.js') }}"></script>
<script src="{{ asset('public/frontend/js/jquery.counterup.min.js') }}"></script>
<script src="{{ asset('public/frontend/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('public/frontend/js/select2.full.js') }}"></script>
<script src="{{ asset('public/frontend/js/toastr.min.js') }}"></script>
<script src="https://www.paypalobjects.com/api/checkout.js"></script>
<script src="{{ asset('public/frontend/js/jquery.validate.min.js') }}"></script>
<script src="{{ asset('public/frontend/js/extra_validation.js') }}"></script>
<script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit">
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
<script src="https://js.stripe.com/v3/"></script>

<script>
    const stripe = Stripe('{{ env('STRIPE_PUBLIC_KEY') }}');
    console.log('stripe',stripe)

</script>
<script src="{{ asset('public/frontend/js/donation.js') }}"></script>


