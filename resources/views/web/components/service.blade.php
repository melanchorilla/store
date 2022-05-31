<!-- Method area Start -->
<section class="method-area bg-color ptb--80 mb--95" data-bg-color="#f6f6f6">
    <div class="container">
        <div class="row justify-content-center">
          <?php $datapromo = DB::table('promo')->limit(2)->get(); ?>
          @foreach ($datapromo as $result)
            <div class="col-lg-3 col-sm-5 col-9 mb-md--50">
                <div class="method-box">
                    <i class="flaticon flaticon-two-circling-arrows"></i>
                    <h4>90 days return</h4>
                    <p>3 days for free return</p>
                </div>
            </div>
          @endforeach
        </div>
    </div>
</section>
<!-- Method area End -->
