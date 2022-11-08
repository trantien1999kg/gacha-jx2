<nav class="sidebar-nav">

    <div class="sidebar-header">

        <div class="box" style="padding: 15px 0px 0px 0px;">

            <div class="logo-admin" style="text-align: center">

                <a href="index.php" title="logo"> <img src="images/logo.png" alt="" width="170"
                        <?=($config['logo']==true) ? 'class="none"':''?> /> </a>

            </div>

            <div class="line-admin">

                <span><i class="fas fa-globe"></i></span>

            </div>

        </div>

    </div>

    <ul class="metismenu" id="menu1">

        <li>

            <a class="home" href="index.php" title="Trang chủ">

                <i class="nav-icon text-sm fal fa-home"></i>Trang Chủ</a>

        </li>

        <li class="<?=($com=='baiviet' && ($_GET['type']=='phan-thuong')) ? "active" :""?>">

            <a class="has-arrow" href="#"
                aria-expanded=" <?=($com=='baiviet' && ($_GET['type']=='phan-thuong')) ? "true" :"false"?>">

                <span>

                    <i class="nav-icon text-sm fal fa-boxes"></i>Quản lý phần thưởng

                </span>

            </a>

            <ul aria-expanded="<?=($com=='baiviet' && ($_GET['type']=='phan-thuong')) ? "true" :"false"?>"
                class="collapse <?=($com=='baiviet' && ($_GET['type']=='phan-thuong')) ? "in" :""?>"
                <?=($com=='baiviet' && ($_GET['type']=='phan-thuong')) ? "" :"style='height: 0px;'"?>>

                <li class="<?=($com=='baiviet' && $act=='man' && 'phan-thuong'==$_GET['type']) ? "this" :""?>">

                    <a href="index.php?com=baiviet&act=man&type=phan-thuong&page=1">Danh sách</a>

                </li>

            </ul>

        </li>
        <li class="<?=($com=='baiviet' && ($_GET['type']=='thong-ke')) ? "active" :""?>">

            <a class="has-arrow" href="#"
                aria-expanded=" <?=($com=='baiviet' && ($_GET['type']=='thong-ke')) ? "true" :"false"?>">

                <span>

                    <i class="nav-icon text-sm fal fa-boxes"></i>Quản lý thống kê

                </span>

            </a>

            <ul aria-expanded="<?=($com=='baiviet' && ($_GET['type']=='thong-ke')) ? "true" :"false"?>"
                class="collapse <?=($com=='baiviet' && ($_GET['type']=='thong-ke')) ? "in" :""?>"
                <?=($com=='baiviet' && ($_GET['type']=='thong-ke')) ? "" :"style='height: 0px;'"?>>

                <li class="<?=($com=='baiviet' && $act=='man' && 'thong-ke'==$_GET['type']) ? "this" :""?>">

                    <a href="index.php?com=baiviet&act=man&type=thong-ke&page=1">Danh sách</a>

                </li>

            </ul>

        </li>
        <?php if(count($GLOBAL['bannerqc'])>0){?>

<li <?=($com=='bannerqc') ? ' class="active"' : '' ?>>

    <a class="has-arrow" href="#" aria-expanded="<?=($com=='bannerqc') ? 'true' : 'false' ?>">

        <i class="nav-icon text-sm fal fa-pager"></i>Background - Logo - Hình ảnh

    </a>

    <ul aria-expanded="<?=($com=='bannerqc') ? 'true' : 'false' ?>"
        class="collapse <?=($com=='bannerqc') ? 'in' : '' ?>"
        <?=($com=='bannerqc') ? '' : 'style="height: 0px;"' ?>>

        <?php foreach ($GLOBAL['bannerqc'] as $key =>$value){?>

        <li <?php if(isset($kiemtra)){if($func->checkPermissions('bannerqc','capnhat',$key)) echo 'class="none"'; }?>
            <?php if($_GET['type']==$key) echo ' class="this"' ?>><a
                href="index.html?com=bannerqc&act=capnhat&type=<?=$key?>" title=""><?=$value['title_main']?></a>

        </li>

        <?php }?>

    </ul>

</li>

<?php }?>

        <?php if($GLOBAL_USER==true){?>

        <?php if($func->checkUserAdmin()){?>

        <li <?=($com=='user') ? 'class="active"' : '' ?>>

            <a class="has-arrow" href="#" aria-expanded="fa<?=($com=='user') ? 'true' : 'false' ?>">

                <i class="nav-icon text-sm fal fa-users-cog"></i>Tài khoản admin

            </a>

            <ul aria-expanded="<?=($com=='user') ? 'true' : 'false' ?>"
                class="collapse <?=($com=='user') ? 'in' : '' ?>" <?=($com=='user') ? '' : 'style="height: 0px;"' ?>>

                <?php if($GLOBAL_USER==true){?>

                <li <?php if($_GET['com']=='user' && $_GET['act']=='man') echo ' class="this"' ?>><a
                        href="index.php?com=user&act=man&type=user&page=1"><?=_account?></a></li>

                <?php }?>

            </ul>

        </li>

        <?php }?>

        <?php }?>
        

        <?php if($GLOBAL_LANG==true){?>

        <li <?=($_GET['com']=='ngonngu') ? 'class="active"' : '' ?>>

            <a class="has-arrow" href="#" aria-expanded="<?=($_GET['com']=='ngonngu') ? 'true' : 'false' ?>">

                <i class="nav-icon text-sm fal fa-language"></i> Hỗ trợ ngôn ngữ

            </a>

            <ul aria-expanded="<?=($_GET['com']=='ngonngu') ? 'true' : 'false' ?>"
                class="collapse <?=($_GET['com']=='ngonngu') ? 'in' : '' ?>"
                <?=($_GET['com']=='ngonngu') ? '' : 'style="height: 0px;"' ?>>

                <li <?php if($_GET['com']=='ngonngu' && $_GET['act']=='man_lang') echo ' class="this"' ?>><a
                        href="index.php?com=ngonngu&act=man_lang"><?=_ngonngu?></a></li>

            </ul>

        </li>

        <?php }?>

    </ul>

</nav>