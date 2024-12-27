<footer class="footer">
    <div class="footer-container">
        <div class="footer-main container">
            <div class="footer-left">
                <h3><?php echo e($lang->getMobileApp); ?></h3>
                <div class="stores">
                    <img src="/assets/images/google-play.webp" alt="Google Play">
                    <img src="/assets/images/app-store.webp" alt="App Store">
                </div>
                <div class="socials">
                    <?php if($siteSettings->facebook): ?>
                        <a href="<?php echo e($siteSettings->facebook); ?>" target="_blank" rel="noopener"><img src="/assets/images/facebook 1.svg" alt="Facebook"></a>
                    <?php endif; ?>
                    <?php if($siteSettings->twitter): ?>
                        <a href="<?php echo e($siteSettings->twitter); ?>" target="_blank" rel="noopener"><img src="/assets/images/twitter-sign 1.svg" alt="Twitter"></a>
                    <?php endif; ?>
                    <?php if($siteSettings->linkedin): ?>
                        <a href="<?php echo e($siteSettings->linkedin); ?>" target="_blank" rel="noopener"><img src="/assets/images/linkedin 1.svg" alt="LinkedIn"></a>
                    <?php endif; ?>
                </div>
            </div>


                <!-- TOP.GE ASYNC COUNTER CODE -->
                <div id="top-ge-counter-container" data-site-id="116059"></div>
                <script async src="//counter.top.ge/counter.js"></script>
                <!-- / END OF TOP.GE COUNTER CODE -->


            <div class="footer-right">
                <h3><?php echo e($lang->subscribe); ?></h3>
                <p><?php echo e($lang->subscribeDescr); ?></p>
                <div class="subscribe-div">
                    <form action="<?php echo e(url('subscribe')); ?>" class="subscribe" method="post" autocomplete="off">
                        <?php echo csrf_field(); ?>
                        <input id="emailsubscribe" type="email" required placeholder="<?php echo e($lang->yourEmail); ?>" size="55" name="email">
                        <button><?php echo e($lang->subscribe); ?></button>
                        <small class="form-text" style="display: none;"></small>
                    </form>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="footer-lower">
                <div class="footer-lower-a-div">
                    <?php $__currentLoopData = $footerMenu; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <a href="<?php echo e(url((getCurrentLocale() == 'ka' ? '' : getCurrentLocale() . '/') . $item->slug)); ?>"><?php echo e($item->name); ?></a>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php $__currentLoopData = $primaryMenu; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <a href="<?php echo e(url((getCurrentLocale() == 'ka' ? '' : getCurrentLocale() . '/') . $item->slug)); ?>"><?php echo e($item->name); ?></a>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
                <p>© 2022 <?php echo e($lang->copyright); ?></p>
            </div>
            <div class="authorise">
                <p>© 2022 <?php echo e($lang->copyright); ?></p>
            </div>
        </div>
    </div>
</footer>

<?php echo $__env->yieldPushContent('popup'); ?>

<?php $__env->startPush('js'); ?>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" referrerpolicy="no-referrer"></script>
    
    <script src="<?php echo e(url('assets/js/popup.js')); ?>"></script>

    <script>
        var csrfToken = $('meta[name="csrf-token"]').attr('content');
        var footerSubscribeForm = $('.subscribe');
        var footerSubscribeFormInput = footerSubscribeForm.find('input[type=email]');
        // var footerSubscribeFormInputLabel = footerSubscribeFormInput.closest('.md-form').find('label');
        var footerSubscribeFormUrl;
        var footerSubscribeFormData;
        var footerSubscribeFormText = footerSubscribeForm.find('.form-text');
        var footerSubscribeFormSubmitBtn = footerSubscribeForm.find('.subscribe-submit-btn');

        footerSubscribeFormSubmitBtn.click(function(e) {
            e.preventDefault();

            footerSubscribeForm.submit();
        });

        footerSubscribeForm.submit(function (e) {
            e.preventDefault();

            footerSubscribeFormUrl = footerSubscribeForm.attr('action');
            footerSubscribeFormData = footerSubscribeForm.serialize();

            $.ajax({
                type: 'post',
                url: footerSubscribeFormUrl,
                headers: {
                    'X-CSRF-TOKEN': csrfToken
                },
                data: footerSubscribeFormData,
                success: function (data) {
                    footerSubscribeFormText.removeClass('text-danger');
                    footerSubscribeFormText.addClass('text-success');
                    footerSubscribeFormText.css('display', 'block');
                    footerSubscribeFormText.text('<?php echo e($lang->successfullySubscribed); ?>');
                    footerSubscribeFormInput.val('');
                    footerSubscribeFormInput.blur();
                    // footerSubscribeFormInputLabel.removeClass('active');
                    setTimeout(function () {
                        if (footerSubscribeFormText.hasClass('text-success')) {
                            footerSubscribeFormText.css('display', 'none');
                        }
                    }, 5000);
                },
                error: function (request, status, error) {
                    footerSubscribeFormText.removeClass('text-success');
                    footerSubscribeFormText.addClass('text-danger');
                    footerSubscribeFormText.css('display', 'block');
                    footerSubscribeFormText.text('<?php echo e($lang->emailAlreadyExists); ?>');
                }
            });
        });
    </script>

<?php if(isset($isHomePage) || isset($isBankCurrencies)): ?>
    <?php $__env->startPush('css'); ?>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.4.18/sweetalert2.min.css" integrity="sha512-CJ5goVzT/8VLx0FE2KJwDxA7C6gVMkIGKDx31a84D7P4V3lOVJlGUhC2mEqmMHOFotYv4O0nqAOD0sEzsaLMBg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <?php $__env->stopPush(); ?>
    <?php $__env->startPush('js'); ?>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.4.18/sweetalert2.all.min.js" integrity="sha512-4+OQqM/O4AkUlCzcn4hcNN7nFwYTYiuMQlhPjdi0Vcpn2ALkrIStJZkxCNauh9WiY6Fkc0FbelhU13feOuX5/A==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <?php $__env->stopPush(); ?>

    <script>
         
        $('.copy-url-button').click(function (e) {
            e.preventDefault();
            Swal.fire({
                position: 'bottom-left',
                // icon: 'success',
                title: '<?php echo e($lang->linkCopied); ?>',
                showConfirmButton: false,
                timer: 1000
            });
        });

        //     var drawSparkLine = function(data, id) {
        //     var canvas = document.getElementById('spark-'+id),
        //         ctx = canvas.getContext('2d'),
        //         max = getMax(data),
        //         xstep = canvas.width / data.length,
        //         x = xstep,
        //         xx = 5,
        //         y = calculateY(data, 0, canvas.height, max);
            
            
        //     ctx.fillRect(0, 0, canvas.width, canvas.height);
        //     ctx.beginPath();
        //     ctx.moveTo(xx, y);
        //     ctx.strokeStyle = "#2C82C9";
        //     ctx.fillStyle = "#fff";
        //     ctx.lineWidth = 1;
            
        //     //ctx.lineJoin = "round";
        //     ctx.lineCap  = "round";
        //       ctx.lineJoin = "round";
        //     ctx.arc(xx, y, 3, 0, 2 * Math.PI);
            
        //     for(var i=1; i<data.length; i++) {
        //       y = calculateY(data, i, canvas.height, max);
            
        //       ctx.lineTo(x, y);
        //       //ctx.arc(x, y, 3, 0, 2 * Math.PI, true);
        //       //ctx.bezierCurveTo(x, y, x + 1, y + 1, x + .5, y + .5);
        
        //       ctx.moveTo(x+.5, y+.5);
            
        //       x = x + xstep;
        //     }
            
        //     ctx.stroke();
        //     //ctx.fill();
        //   };
        
        
        //   var calculateX = function(x, index) {
        //     for(var i=0; i<index; i++) {
        //       x += x;
        //     }
            
        //     return x;
        //   }
        
        //   var calculateY = function(data, index, height, max) {
        //     var valueRatio = data[index] / max * height - 10;
            
        //     return height - valueRatio;
        //   };
        
        //   var getMax = function(data) {
            
        //     return Math.max.apply(null, data);
        //   }
        //   function rnd(min, max){
        //       return min + ((max - min) * Math.random());
        //   }
        
        //for(var i = 0; i < 100; i++)
        // data.push(rnd(13, 14));


        $(".new-button-currency-popup").click(function(){
            var arrcurr = ['GEL'];
            $boxes = $('input[name=currencyCheckBox]').each(function( index ) {
                var check =  $( this ).is(':checked');
                if(check){arrcurr.push($( this ).attr('curr-code'))}
                });
            
                $('.currency-input').each(function( index ) {

                        if(arrcurr.includes($( this ).attr('curr-code'))){
                            $( this ).css('display', '')
                        }else{
                            $( this ).css('display', 'none')
                        }
                        
                    });
                    changeRates('und');
            
        })
            $(document).ready(function(){
                fillExchange('ready');
                getsevenDays();
                getChart();
                let currs = $('input[name="currencyCheckBox"]:checked');
                currs.map(function (key, val) {
                    code = val.getAttribute('curr-code')
                    myFunction('#checkboxHover'+code, '#hoverH'+code, '#hoverp'+code, val)
                })
            })

            $("#dateexchangerate").change(function(){
            
            fillExchange('date');
        })
        function fillExchange(act = '') {
            let dateexchangerate = $("#dateexchangerate").val();
            
            $.post("/get-currencies-data",
            {
                _token: '<?php echo e(csrf_token()); ?>',
                exchangedate: dateexchangerate,
                obj:'<?php echo e(request()->route("obj")); ?>',
                active:'<?php echo e(request()->route("active")); ?>',
                date:'<?php echo e(request()->route("date")); ?>',
                act: (act == 'ready')?'ready':''
            },
            function(data){
                
                
                //$("#currencies-container_box").html(data)
                $('#headerConverterLoader').remove();
                $("#headerConverter").html(data);
                val =(act == 'date')?2:0;

            
                changeRates('und', act);
                
            });
            
        }
            function getChart(code="", dateofch="") {

                if ($('#lineChartLoader').css('display') == 'none') {
                    $('#lineChartLoader').css('display', 'flex');
                }
                
                $.post("<?php echo e(url((getCurrentLocale() == 'ka' ? '' : getCurrentLocale() . '/') . 'get-currencies-data-chart-days')); ?>",
                {
                    _token: '<?php echo e(csrf_token()); ?>',
                    dateofch: dateofch,
                    code:code
                },
                function(data){
                
                    drawChart(data[0], data[1], code, data[2]);

                    $('#lineChartLoader').css('display', 'none');
                    
                    
                });
                
            }
            function getsevenDays(){
                $.post("/get-currencies-data-seven-days",
                {
                    _token: '<?php echo e(csrf_token()); ?>',
                    city: "Duckburg"
                },
                function(data){
                    var arr =[];
                    var arr1 = [];

                    // console.log(data);
                    
                    for(i = 0; i < data.length; i++) {
                        
                        for(j = 0; j < data[i].length; j++){
                            // console.log(j)
                            if(typeof arr[data[i][j].code] === 'undefined'){
                                arr[data[i][j].code]=[];
                            }
                            arr[data[i][j].code].push(data[i][j].diff);
                        }
                    // arr1 [] = 

                    }

                    // console.log(arr);

                    for (var arrItem in arr) {
                        // console.log(arr[arrItem][0])
                        // drawSparkLine(arr[arrItem], arrItem);
                        // console.log(arr[arrItem][6]);
                        if (arr[arrItem][0] >= arr[arrItem][1]) {
                            $('#line-image-' + arrItem).attr('src', '<?php echo e(url('')); ?>/assets/images/chart-success-'+Math.floor(Math.random() * 2 + 1)+'.svg');
                        } else {
                            $('#line-image-' + arrItem).attr('src', '<?php echo e(url('')); ?>/assets/images/chart-down-'+Math.floor(Math.random() * 2 + 1)+'.svg');
                        }
                    }

                });
                
            }

            var exchangeTableShowMoreBtn1 = $('.exchange1').find('.show-more');

            var isActiveExchangeCurrs1 = false;

            exchangeTableShowMoreBtn1.click(function(){
                $(this).closest('.exchange').find('.exchange-table').toggleClass('active');
                isActiveExchangeCurrs1 = ! isActiveExchangeCurrs1;
            });

            var exchangeTableShowMoreBtn2 = $('.exchange2').find('.show-more');

            var isActiveExchangeCurrs2 = false;

            exchangeTableShowMoreBtn2.click(function(){
                $(this).closest('.exchange').find('.exchange-table').toggleClass('active');
                isActiveExchangeCurrs2 = ! isActiveExchangeCurrs2;
            });

            var exchangeTable;


            $("#searchableRates").keyup(function(){
                // var tr = document.getElementsByClassName("searchablerate");
                // console.log(tr);
                // for(i = 0; i< tr.length; i++){
                //     $(tr)
                // }

                exchangeTable = $(this).closest('.exchange').find('.exchange-table');
                
                if ($(this).val() == '') {
                    $('.searchablerate').css('display', '');

                    if (isActiveExchangeCurrs1 == false) {
                        exchangeTable.removeClass('active');
                    }
                } else {
                    
                    if (isActiveExchangeCurrs1 == false) {
                        exchangeTable.addClass('active');
                    }

                    $('.searchablerate:not([data-code="'+$(this).val().toLowerCase()+'"])').css("display", "");
                    
                    $('.searchablerate:not([data-code*="'+$(this).val().toLowerCase()+'"])').css("display", "none");
                }
            })

            $("#searchableRates1").keyup(function(){
                // var tr = document.getElementsByClassName("searchablerate");
                // console.log(tr);
                // for(i = 0; i< tr.length; i++){
                //     $(tr)
                // }

                exchangeTable = $(this).closest('.exchange').find('.exchange-table');

                if ($(this).val() == '') {
                    $('.searchablerate1').css('display', '');

                    if (isActiveExchangeCurrs2 == false) {
                        exchangeTable.removeClass('active');
                    }
                } else {

                    if (isActiveExchangeCurrs2 == false) {
                        exchangeTable.addClass('active');
                    }

                    $('.searchablerate1:not([data-code="'+$(this).val().toLowerCase()+'"])').css("display", "");
                    
                    $('.searchablerate1:not([data-code*="'+$(this).val().toLowerCase()+'"])').css("display", "none");
                }
            });

            var myChart;
            function drawChart(datas, dates, code="usd", quantity) {
                if(code == "") code = "usd"
                const ctx = document.getElementById('lineChart').getContext('2d');
                var gradient = ctx.createLinearGradient(0, 0, 0, 600);
                gradient.addColorStop(0, 'rgba(0, 89, 255, 0.16)');
                gradient.addColorStop(1, 'rgba(0, 89, 255, 0.03)');

                const DATA_COUNT = 14;
                const labels = dates;
                const datapoints = datas;
                
                const data = {
                    labels: labels,
                    datasets: [
                        {
                            label: quantity+" "+code,
                            data: datapoints,
                            backgroundColor: gradient, // Put the gradient here as a fill color
                            borderColor: "#80BFD3",
                            pointBackgroundColor: "transparent",
                            pointBorderColor: "#3E92CC",
                            pointHighlightFill: "#3E92CC",
                            pointHighlightStroke: "#0059FF",
                            fill: true,
                            cubicInterpolationMode: 'monotone',
                            tension: 10,
                            pointHitRadius: 10000//set as you wish
                        }
                    ],
                }

                const config = {
                    type: 'line',
                    data: data,
                    options: {
                        responsive: true,
                        plugins: {
                            title: {
                                display: true,
                            },
                            legend: {
                                display: false,
                            },
                            tooltips: {
                                mode: 'index',
                                intersect: false,
                            },
                            hover: {
                                mode: 'nearest',
                                intersect: true
                            },
                            // interaction: {
                            //     intersect: false,
                            // },
                        },
                        scales: {
                            x: {
                                display: true,
                                title: {
                                    display: true,
                                },
                            },
                            y: {
                                display: true,
                                // suggestedMin: 2.0,
                                // suggestedMax: 4.0,
                            },
                        },
                    },
                }
                myChart = new Chart(ctx, config);
            }

            var defaultChartFilterOptionBtn = 'usd';

            $(function() {
                $('.filter-options-btn').click(function(){
                    defaultChartFilterOptionBtn = $(this).attr('value');


                    getChart(defaultChartFilterOptionBtn, $("#chartDate").val());

                    myChart.destroy();
                });
                $("#chartDate").change(function(){
                    myChart.destroy();
                    getChart($('.filter-options-btn').attr('value'), $("#chartDate").val());
                })
                
                
            });
        // dolari evro lira rub 

        var mainObj = null
    var mainVal = null
    function changeRates(obj, onch=0) {
            
                if(obj != 'und') {mainObj = $(obj).attr('curr-code');mainVal=$(obj).val();}
                if(mainObj != null && obj == 'und') {
                    $("#header-converter-input-"+mainObj).val(mainVal);
                    obj = $("#header-converter-input-"+mainObj);
            
                }
                var reqObj = '<?php echo e(request()->route("obj")); ?>';

                if(onch != 1){
                    if(reqObj != '')reqObj = reqObj.split('-')
                    if(mainObj == null && obj == 'und' && reqObj.length < 2 )return;
                    
                    if(reqObj.length == 2){
                    
                    // mainObj = reqObj[0];mainVal=reqObj[1];

                    if('<?php echo e(request()->route("date")); ?>' != '' && onch != 'date'){
                    
                        $("#dateexchangerate").val('<?php echo e(request()->route("date")); ?>');
                        $('#dateexchangerate-value').html('<?php echo e(request()->route("date")); ?>');
                    
                        
                        $("#header-converter-input-"+reqObj[0]).val(reqObj[1]);
                        obj = $("#header-converter-input-"+reqObj[0]);
                        mainObj = $(obj).attr('curr-code');mainVal=$(obj).val();
                    }
                        
                    }
                }

                var rate = parseFloat($(obj).attr('curr-rate'));
                var code = $(obj).attr('curr-code');
                var quantity =  parseFloat($(obj).attr('data-quantity'));
                var value = $(obj).val();
            
                codesturul = '';

                $('.inputeelementrates').each(function( index ) {
                    if($("#checkboxInput"+$(this).attr('curr-code')).is(':checked')) codesturul +=$(this).attr('curr-code')+'-';

                    if($(this).attr('curr-code') != code) {
                        val = parseFloat($(this).attr('curr-rate')) * value;
                        
                        if ($(this).attr('curr-code') == 'GEL') {
                            va = (value * rate).toFixed(2);
                            va = va / quantity; 
                            $(this).val(va)  
                        } else {
                            va = (value * rate * $(this).data('quantity') / parseFloat($(this).attr('curr-rate'))).toFixed(2);
                            va = va / quantity; 
                            $(this).val(va);

                        }


                        
                    }else{
                    //  $("#header-converter-input-"+$(obj).attr('curr-code')).val($(obj).val())
                    }
                });
                
            datet = ($("#dateexchangerate").val() =='')?'<?php echo e(date("Y-m-d",time())); ?>':$("#dateexchangerate").val();
            var link = '';
            var pushUrl = "<?php echo e(getCurrentLocale() == 'ka' ? '' : '/' .getCurrentLocale()); ?>/currencies/"+code+"-"+value+"/"+codesturul+"/"+datet;
            $('.link-share-button').each(function( index ) {
                if($(this).attr('data-type') == 'whatsapp')link = 'whatsapp://send?text=';
                if($(this).attr('data-type') == 'viber')link = 'viber://forward?text=';
                if($(this).attr('data-type') == 'messanger')link = 'fb-messenger://share/?link=';
                $(this).attr('href', link+'<?php echo e(url('')); ?>'+pushUrl);
            });
            window.history.pushState("object or string", "Title", pushUrl);
    }
    $('.copy-url-button').click(function(){
            var dummy = document.createElement('input'),
                text = window.location.href;
                document.body.appendChild(dummy);
                dummy.value = text;
                dummy.select();
                document.execCommand('copy');
                document.body.removeChild(dummy);

        // window.location.href.select(); //select textarea contenrs
        // document.execCommand("copy");
        //window.prompt("Copy to clipboard: Ctrl+C, Enter", window.location.href);
    });

    //    function Copy() {
            
    //         }

</script>

<?php endif; ?>

<?php $__env->stopPush(); ?><?php /**PATH /Users/nkarashvili/Documents/laravel/newproj/resources/views/nn_site/partials/footer.blade.php ENDPATH**/ ?>