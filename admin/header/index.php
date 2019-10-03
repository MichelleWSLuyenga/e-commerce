<button class="m-aside-left-close  m-aside-left-close--skin-dark" id="m_aside_left_close_btn"> <i class="la la-close"></i> </button>
<div id="m_aside_left" class="m-grid__item m-aside-left m-aside-left--skin-dark"> 
  <!-- BEGIN: Aside Menu -->
  <div id="m_ver_menu" class="m-aside-menu  m-aside-menu--skin-dark m-aside-menu--submenu-skin-dark" m-menu-vertical="1" m-menu-scrollable="0"  m-menu-dropdown-timeout="500">
    <ul class="m-menu__nav m-menu__nav--dropdown-submenu-arrow">
      <li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true" m-menu-submenu-toggle="hover"> <a  href="../profile/" class="m-menu__link m-menu__toggle"> <span class="m-menu__link-text" style="font-family: 'Roboto', sans-serif; color:#F00;"> CHANGE PROFILE </span> </a> </li>
      <li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true" m-menu-submenu-toggle="hover"> <a  href="../../" class="m-menu__link m-menu__toggle"> <span class="m-menu__link-text" style="font-family: 'Roboto', sans-serif; color:#F00;"> ORDERING </span> </a> </li>
      <? if($row_user['reseller_status_logo'] == 'T') { ?>
      <li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true" m-menu-submenu-toggle="hover"> <a  href="../logo/" class="m-menu__link m-menu__toggle"> <span class="m-menu__link-text" style="font-family: 'Roboto', sans-serif;"> Upload Logo Picture </span> </a> </li>
      <? } else if($row_user['reseller_status_logo'] != 'T') { } ?>
      <? if($row_user['reseller_status_category_picture'] == 'T') { ?>
          <li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true" m-menu-submenu-toggle="hover"> <a  href="../category/" class="m-menu__link m-menu__toggle"> <span class="m-menu__link-text" style="font-family: 'Roboto', sans-serif;"> Upload Category Picture </span> </a> </li>
          <? } else if($row_user['reseller_status_category_picture'] != 'T') { } ?>
      <? if($row_user['reseller_status_orders'] == 'T') { ?>
      <li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true" m-menu-submenu-toggle="hover"> <a  href="../orders/" class="m-menu__link m-menu__toggle"> <span class="m-menu__link-text" style="font-family: 'Roboto', sans-serif;"> Orders </span> </a> </li>
      <? } else if($row_user['reseller_status_orders'] != 'T') { } ?>
      <? if($row_user['reseller_status_report'] == 'T' || $row_user['reseller_status_categorywise_sale_report'] == 'T') { ?>
      <li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true" m-menu-submenu-toggle="hover"> <a  href="javascript:;" class="m-menu__link m-menu__toggle"> <span class="m-menu__link-text" style="font-family: 'Roboto', sans-serif;"> Reports </span> </a>
        <div class="m-menu__submenu "> <span class="m-menu__arrow"></span>
          <ul class="m-menu__subnav">
            <li class="m-menu__item  m-menu__item--parent" aria-haspopup="true"> <span class="m-menu__link"> <span class="m-menu__link-text" style="font-family: 'Roboto', sans-serif;"> Reports </span> </span> </li>
            <? if($row_user['reseller_status_report'] == 'T') { ?>
            <li class="m-menu__item " aria-haspopup="true"> <a  href="../report/" class="m-menu__link "> <i class="m-menu__link-bullet m-menu__link-bullet--dot"> <span></span> </i> <span class="m-menu__link-text" style="font-family: 'Roboto', sans-serif;"> Report </span> </a> </li>
            <? } else if($row_user['reseller_status_report'] != 'T') { } ?>
            <? if($row_user['reseller_status_categorywise_sale_report'] == 'T') { ?>
            <li class="m-menu__item " aria-haspopup="true"> <a  href="../categorywise/" class="m-menu__link "> <i class="m-menu__link-bullet m-menu__link-bullet--dot"> <span></span> </i> <span class="m-menu__link-text" style="font-family: 'Roboto', sans-serif;"> Categorywise Sales Report </span> </a> </li>
            <? } else if($row_user['reseller_status_categorywise_sale_report'] != 'T') { } ?>
          </ul>
        </div>
      </li>
      <? } else if($row_user['reseller_status_report'] != 'T' && $row_user['reseller_status_categorywise_sale_report'] != 'T') { } ?>
      <? if($row_user['reseller_status_staffsuser'] == 'T') { ?>
      <li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true" m-menu-submenu-toggle="hover"> <a  href="javascript:;" class="m-menu__link m-menu__toggle"> <span class="m-menu__link-text" style="font-family: 'Roboto', sans-serif;"> Create Staffs User </span> </a>
        <div class="m-menu__submenu "> <span class="m-menu__arrow"></span>
          <ul class="m-menu__subnav">
            <li class="m-menu__item  m-menu__item--parent" aria-haspopup="true"> <span class="m-menu__link"> <span class="m-menu__link-text" style="font-family: 'Roboto', sans-serif;"> Create Staffs User </span> </span> </li>
            <li class="m-menu__item " aria-haspopup="true"> <a  href="../staffsuser/" class="m-menu__link "> <i class="m-menu__link-bullet m-menu__link-bullet--dot"> <span></span> </i> <span class="m-menu__link-text" style="font-family: 'Roboto', sans-serif;"> Add Staffs User </span> </a> </li>
            <li class="m-menu__item " aria-haspopup="true"> <a  href="../staffsuser/view.php" class="m-menu__link "> <i class="m-menu__link-bullet m-menu__link-bullet--dot"> <span></span> </i> <span class="m-menu__link-text" style="font-family: 'Roboto', sans-serif;"> View Staffs User </span> </a> </li>
          </ul>
        </div>
      </li>
      <? } else if($row_user['reseller_status_staffsuser'] != 'T') { } ?>
      <li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true" m-menu-submenu-toggle="hover"> <a  href="../logout/" class="m-menu__link m-menu__toggle"> <span class="m-menu__link-text" style="font-family: 'Roboto', sans-serif; color:#F00;"> LOGOUT </span> </a> </li>
    </ul>
  </div>
  <!-- END: Aside Menu --> 
</div>
