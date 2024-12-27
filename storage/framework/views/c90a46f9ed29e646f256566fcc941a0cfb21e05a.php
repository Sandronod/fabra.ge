<?php
$menuid=1;
?>


<?php $__env->startSection('content'); ?>

    <div class="page-content">
        <!-- BEGIN PAGE HEADER-->
        <!-- BEGIN PAGE BAR -->
        <div class="page-bar">
            <ul class="page-breadcrumb">
                <li>
                    <a href="<?php echo e(url(getCurrentLocale() . '/manager')); ?>"><?php echo e(trans('general.bcHome')); ?></a>
                    <i class="fa fa-circle"></i>
                </li>
                
            </ul>
        </div>
        <!-- END PAGE BAR -->
        <!-- BEGIN PAGE TITLE-->
        <h3 class="page-title"> <?php echo e(trans('general.ptMenuItem')); ?>
        </h3>
        <!-- END PAGE TITLE-->
        <!-- END PAGE HEADER-->
        <a href="<?php echo e(url(getCurrentLocale() . '/manager/menu')); ?>" class="btn green btn-outline sbold uppercase margin-bottom-20"><i class="fa fa-arrow-left"></i> <?php echo e(trans('general.back')); ?></a>
        <!-- END BACK BTN -->
        <?php if($primary): ?>
        <div class="note note-info">
            <span class="bold"><?php echo e(trans('general.ntNotifText')); ?></span>
        </div>
        <?php endif; ?>
        <!-- NETSTABLE START -->
        <div class="portlet light bordered">
            <div class="portlet-body ">
                <div class="row">
                    <div class="col-md-12">
                        <div id="nestable_list_menu">
                            <button type="button" class="btn green btn-outline sbold uppercase" data-action="expand-all"><?php echo e(trans('general.expandAll')); ?></button>
                            <button type="button" class="btn red btn-outline sbold uppercase" data-action="collapse-all"><?php echo e(trans('general.collapseAll')); ?></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="portlet light bordered">
                    <div class="portlet-title">
                        <div class="caption">
                            <i class="icon-bubble font-purple"></i>
                            <span class="caption-subject font-purple sbold uppercase"><?php echo e(trans('general.dragAndDropMenu')); ?></span>
                        </div>
                        <div class="actions">
                            <div class="btn-group btn-group-devided" data-toggle="buttons">
                                <label  onclick="document.location = 'items/create'" class="btn btn-transparent blue btn-circle btn-sm active" >
                                    <input  type="radio" name="options" class="toggle" id="option1"><?php echo e(trans('general.newItem')); ?></label>
                                <label onclick="SaveMenuOrder()"  class="btn btn-transparent grey-salsa btn-circle btn-sm" id="SaveMenuOrder" style="">
                                    <input type="radio" name="options" class="toggle" id="option2"><?php echo e(trans('general.saveMenu')); ?></label>    
                            </div>
                        </div>
                    </div>
                    <div class="portlet-body">
                        <div class="alert alert-danger alert-notif update-danger" style="display:none;">
                            <button type="button" class="close"></button>
                            <?php echo e(trans('general.cannotDelete')); ?>
                        </div>                  
                        <!-- client Side Notification END -->
                        <div class="dd nestable" id="nestable3">
                            <ol class="dd-list" id="menulists">
                                <?php echo $allitems; ?>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- NETSTABLE END -->
    </div>

    <!-- Modal (item delete) -->
    <div class="modal fade" id="delete-item" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel"><?php echo e(trans('general.deleteQuestion')); ?></h4>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal"><?php echo e(trans('general.no')); ?></button>
                    <button type="button" class="btn btn-danger confirm" data-dismiss="modal"><?php echo e(trans('general.yes')); ?></button>
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript">
        var firstmenuorder = "";
        var menuorder = "";
        $(document).ready(function(){
            getready();
        });
        function getready(){

            var updateOutput = function(e){
                var list = e.length ? e : $(e.target),
                    output = list.data("output");
                if(window.JSON){
                    menuorder = window.JSON.stringify(list.nestable("serialize"));
                    if(menuorder != firstmenuorder && firstmenuorder != ""){
                       $("#SaveMenuOrder").addClass("active"); 
                    }
                    firstmenuorder = menuorder;
                    if($(this).attr("id") == "nestable3"){
                    }
                }else{
                    output.val("JSON browser support required for this demo.");
                }
            };

            // activate Nestable for list 2
            $("#nestable3").nestable({
                group: 1
            }).on("change", updateOutput);
            updateOutput($("#nestable3").data("output", $("#nestable3-output")));
            // output initial serialised data

            $("#nestable-menu").on("click", function(e){
                var target = $(e.target),
                    action = target.data("action");
                if(action === 'expand-all'){
                    $(".dd").nestable("expandAll");
                }
                if(action === "collapse-all"){
                    $(".dd").nestable("collapseAll");
                }
            });
            $("#nestable3").nestable();
        }
        var menord = "";
        var deletedIds = "";
        function SaveMenuOrder(){

            if(menuorder.length < 2) return;
            menu_id = "<?php echo $menuid;?>";

            if(menuorder == "") return;
            $.ajax({
                url: "saveitemorders",
                type: "POST",
                data: {menu_id : "<?php echo e($id); ?>", menuorder:menuorder, deletedIds:deletedIds, "_token" : $("meta[name='csrf-token']").attr("content")},
                success: function(data, textStatus, jqXHR){
                    $("#SaveMenuOrder").removeClass("active"); 
                     if(data == "ok"){
                        location.reload();
                    }

                },
                error: function (jqXHR, textStatus, errorThrown){
                    alert(errorThrown);
                },
                complete: function (data) {

                    $("#nestable3").nestable({
                        group: 1
                    }).change();
                    
                }
            });
        }

        // menu item delete script START
        var menuitem_obj;
        var menuitem_id;

        function RemoveItem(obj, id){
            $("#delete-item").modal("show");

            menuitem_obj = obj;
            menuitem_id = id;
       }

       $(document).on("click", "#delete-item .confirm", function(){

            pa = $(menuitem_obj).parent();
            mainli = $($($($(pa).parent())).parent());
            if($(mainli).children("ol").length){
                $(".update-danger").show();
                $(".update-danger").fadeOut(10000);
            }else{
                deletedIds += menuitem_id + ',';
                $(mainli).remove();
                $('#nestable3').nestable({
                    group: 1
                }).change();
            }

       });
       // menu item delete script END
    </script>

    <?php $__env->startPush('body.bottom'); ?>
        <!--.. BEGIN NESTABLE -->
        <link href="<?php echo e(url('assets/nn_cms/global/plugins/jquery-nestable/jquery.nestable.css')); ?>" rel="stylesheet" type="text/css" />
        <!--.. END NESTABLE -->
        <!-- END NESTABLE CSS -->
        <script src="<?php echo e(url('assets/nn_cms/global/plugins/jquery-nestable/jquery.nestable.js')); ?>" type="text/javascript"></script>
        <script src="<?php echo e(url('assets/nn_cms/pages/scripts/ui-nestable.min.js')); ?>" type="text/javascript"></script>
        <!-- END NESTABLE SCRIPTS -->
    <?php $__env->stopPush(); ?>
    
<?php $__env->stopSection(); ?>
<?php echo $__env->make('../nn_cms/index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/nkarashvili/Documents/laravel/newproj/resources/views/nn_cms/pages/nn_menu/menuitem.blade.php ENDPATH**/ ?>