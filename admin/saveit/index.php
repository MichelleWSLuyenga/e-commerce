<button class="m-aside-left-close  m-aside-left-close--skin-dark" id="m_aside_left_close_btn"> <i class="la la-close"></i> </button>
    <div id="m_aside_left" class="m-grid__item m-aside-left m-aside-left--skin-dark">
      <!-- BEGIN: Aside Menu -->
      <div id="m_ver_menu" class="m-aside-menu  m-aside-menu--skin-dark m-aside-menu--submenu-skin-dark" m-menu-vertical="1" m-menu-scrollable="0"  m-menu-dropdown-timeout="500">
        <ul class="m-menu__nav m-menu__nav--dropdown-submenu-arrow">
          <li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true" m-menu-submenu-toggle="hover"> <a  href="../profile/" class="m-menu__link m-menu__toggle"> <span class="m-menu__link-text" style="font-family: 'Roboto', sans-serif; color:#F00;"> CHANGE PROFILE </span> </a> </li>
          <? if($row_user['admin_status_country'] == 'T') { ?>
          <li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true" m-menu-submenu-toggle="hover"> <a  href="../country/" class="m-menu__link m-menu__toggle"> <span class="m-menu__link-text" style="font-family: 'Roboto', sans-serif;"> Country </span> </a> </li>
          <? } else if($row_user['admin_status_country'] == '') { } ?>
          <li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true" m-menu-submenu-toggle="hover"> <a  href="../category/" class="m-menu__link m-menu__toggle"> <span class="m-menu__link-text" style="font-family: 'Roboto', sans-serif;"> Product Category </span> </a> </li>
          <? if($row_user['admin_status_fabrictype'] == 'T') { ?>
          <li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true" m-menu-submenu-toggle="hover"> <a  href="../fabrictype/" class="m-menu__link m-menu__toggle"> <span class="m-menu__link-text" style="font-family: 'Roboto', sans-serif;"> Fabric Type </span> </a> </li>
          <? } else if($row_user['admin_status_fabrictype'] == '') { } ?>
          <? if($row_user['admin_status_brandtype'] == 'T') { ?>
          <li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true" m-menu-submenu-toggle="hover"> <a  href="../fabricbrand/" class="m-menu__link m-menu__toggle"> <span class="m-menu__link-text" style="font-family: 'Roboto', sans-serif;"> Fabric Brand </span> </a> </li>
          <? } else if($row_user['admin_status_brandtype'] == '') { } ?>
          <li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true" m-menu-submenu-toggle="hover"> <a  href="../parameter/" class="m-menu__link m-menu__toggle"> <span class="m-menu__link-text" style="font-family: 'Roboto', sans-serif;"> Other Pricing Parameter </span> </a> </li>
          <li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true" m-menu-submenu-toggle="hover"> <a  href="javascript:;" class="m-menu__link m-menu__toggle"> <span class="m-menu__link-text" style="font-family: 'Roboto', sans-serif;"> Create Extra Option </span> </a>
            <div class="m-menu__submenu "> <span class="m-menu__arrow"></span>
              <ul class="m-menu__subnav">
                <li class="m-menu__item  m-menu__item--parent" aria-haspopup="true"> <span class="m-menu__link"> <span class="m-menu__link-text" style="font-family: 'Roboto', sans-serif;"> Create Extra Option </span> </span> </li>
                <li class="m-menu__item " aria-haspopup="true"> <a  href="../extra/" class="m-menu__link "> <i class="m-menu__link-bullet m-menu__link-bullet--dot"> <span></span> </i> <span class="m-menu__link-text" style="font-family: 'Roboto', sans-serif;"> Add Option </span> </a> </li>
              </ul>
            </div>
          </li>
          <li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true" m-menu-submenu-toggle="hover"> <a  href="javascript:;" class="m-menu__link m-menu__toggle"> <span class="m-menu__link-text" style="font-family: 'Roboto', sans-serif;"> Create Fabrics </span> </a>
            <div class="m-menu__submenu "> <span class="m-menu__arrow"></span>
              <ul class="m-menu__subnav">
                <li class="m-menu__item  m-menu__item--parent" aria-haspopup="true"> <span class="m-menu__link"> <span class="m-menu__link-text" style="font-family: 'Roboto', sans-serif;"> Create Fabrics </span> </span> </li>
                <li class="m-menu__item " aria-haspopup="true"> <a  href="../fabrics/" class="m-menu__link "> <i class="m-menu__link-bullet m-menu__link-bullet--dot"> <span></span> </i> <span class="m-menu__link-text" style="font-family: 'Roboto', sans-serif;"> Add Fabrics </span> </a> </li>
                <li class="m-menu__item " aria-haspopup="true"> <a  href="../fabrics/jacket.php" class="m-menu__link "> <i class="m-menu__link-bullet m-menu__link-bullet--dot"> <span></span> </i> <span class="m-menu__link-text" style="font-family: 'Roboto', sans-serif;"> View Jacket Fabrics </span> </a> </li>
                <li class="m-menu__item " aria-haspopup="true"> <a  href="../fabrics/jeans.php" class="m-menu__link "> <i class="m-menu__link-bullet m-menu__link-bullet--dot"> <span></span> </i> <span class="m-menu__link-text" style="font-family: 'Roboto', sans-serif;"> View Jeans Fabrics </span> </a> </li>
                <li class="m-menu__item " aria-haspopup="true"> <a  href="../fabrics/overcoat.php" class="m-menu__link "> <i class="m-menu__link-bullet m-menu__link-bullet--dot"> <span></span> </i> <span class="m-menu__link-text" style="font-family: 'Roboto', sans-serif;"> View Overcoat Fabrics </span> </a> </li>
                <li class="m-menu__item " aria-haspopup="true"> <a  href="../fabrics/pants.php" class="m-menu__link "> <i class="m-menu__link-bullet m-menu__link-bullet--dot"> <span></span> </i> <span class="m-menu__link-text" style="font-family: 'Roboto', sans-serif;"> View Pants Fabrics </span> </a> </li>
                <li class="m-menu__item " aria-haspopup="true"> <a  href="../fabrics/shirt.php" class="m-menu__link "> <i class="m-menu__link-bullet m-menu__link-bullet--dot"> <span></span> </i> <span class="m-menu__link-text" style="font-family: 'Roboto', sans-serif;"> View Shirt Fabrics </span> </a> </li>
                <li class="m-menu__item " aria-haspopup="true"> <a  href="../fabrics/suit.php" class="m-menu__link "> <i class="m-menu__link-bullet m-menu__link-bullet--dot"> <span></span> </i> <span class="m-menu__link-text" style="font-family: 'Roboto', sans-serif;"> View Suit Fabrics </span> </a> </li>
                <li class="m-menu__item " aria-haspopup="true"> <a  href="../fabrics/vest.php" class="m-menu__link "> <i class="m-menu__link-bullet m-menu__link-bullet--dot"> <span></span> </i> <span class="m-menu__link-text" style="font-family: 'Roboto', sans-serif;"> View Vest Fabrics </span> </a> </li>
              </ul>
            </div>
          </li>
          <li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true" m-menu-submenu-toggle="hover"> <a  href="javascript:;" class="m-menu__link m-menu__toggle"> <span class="m-menu__link-text" style="font-family: 'Roboto', sans-serif;"> Create Lining </span> </a>
            <div class="m-menu__submenu "> <span class="m-menu__arrow"></span>
              <ul class="m-menu__subnav">
                <li class="m-menu__item  m-menu__item--parent" aria-haspopup="true"> <span class="m-menu__link"> <span class="m-menu__link-text" style="font-family: 'Roboto', sans-serif;"> Create Lining </span> </span> </li>
                <li class="m-menu__item " aria-haspopup="true"> <a  href="../lining/" class="m-menu__link "> <i class="m-menu__link-bullet m-menu__link-bullet--dot"> <span></span> </i> <span class="m-menu__link-text" style="font-family: 'Roboto', sans-serif;"> Add Lining </span> </a> </li>
                <li class="m-menu__item " aria-haspopup="true"> <a  href="../lining/jacket.php" class="m-menu__link "> <i class="m-menu__link-bullet m-menu__link-bullet--dot"> <span></span> </i> <span class="m-menu__link-text" style="font-family: 'Roboto', sans-serif;"> View Jacket Lining </span> </a> </li>
                <li class="m-menu__item " aria-haspopup="true"> <a  href="../lining/overcoat.php" class="m-menu__link "> <i class="m-menu__link-bullet m-menu__link-bullet--dot"> <span></span> </i> <span class="m-menu__link-text" style="font-family: 'Roboto', sans-serif;"> View Overcoat Lining </span> </a> </li>
                <li class="m-menu__item " aria-haspopup="true"> <a  href="../lining/pants.php" class="m-menu__link "> <i class="m-menu__link-bullet m-menu__link-bullet--dot"> <span></span> </i> <span class="m-menu__link-text" style="font-family: 'Roboto', sans-serif;"> View Pants Lining </span> </a> </li>
                <li class="m-menu__item " aria-haspopup="true"> <a  href="../lining/suit.php" class="m-menu__link "> <i class="m-menu__link-bullet m-menu__link-bullet--dot"> <span></span> </i> <span class="m-menu__link-text" style="font-family: 'Roboto', sans-serif;"> View Suit Lining </span> </a> </li>
                <li class="m-menu__item " aria-haspopup="true"> <a  href="../lining/vest.php" class="m-menu__link "> <i class="m-menu__link-bullet m-menu__link-bullet--dot"> <span></span> </i> <span class="m-menu__link-text" style="font-family: 'Roboto', sans-serif;"> View Vest Lining </span> </a> </li>
              </ul>
            </div>
          </li>
          <li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true" m-menu-submenu-toggle="hover"> <a  href="javascript:;" class="m-menu__link m-menu__toggle"> <span class="m-menu__link-text" style="font-family: 'Roboto', sans-serif;"> Create Tie </span> </a>
            <div class="m-menu__submenu "> <span class="m-menu__arrow"></span>
              <ul class="m-menu__subnav">
                <li class="m-menu__item  m-menu__item--parent" aria-haspopup="true"> <span class="m-menu__link"> <span class="m-menu__link-text" style="font-family: 'Roboto', sans-serif;"> Create Tie </span> </span> </li>
                <li class="m-menu__item " aria-haspopup="true"> <a  href="../tie/" class="m-menu__link "> <i class="m-menu__link-bullet m-menu__link-bullet--dot"> <span></span> </i> <span class="m-menu__link-text" style="font-family: 'Roboto', sans-serif;"> Add Tie </span> </a> </li>
                <li class="m-menu__item " aria-haspopup="true"> <a  href="../tie/view.php" class="m-menu__link "> <i class="m-menu__link-bullet m-menu__link-bullet--dot"> <span></span> </i> <span class="m-menu__link-text" style="font-family: 'Roboto', sans-serif;"> View Tie </span> </a> </li>
              </ul>
            </div>
          </li>
          <li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true" m-menu-submenu-toggle="hover"> <a  href="javascript:;" class="m-menu__link m-menu__toggle"> <span class="m-menu__link-text" style="font-family: 'Roboto', sans-serif;"> Create Buttons </span> </a>
            <div class="m-menu__submenu "> <span class="m-menu__arrow"></span>
              <ul class="m-menu__subnav">
                <li class="m-menu__item  m-menu__item--parent" aria-haspopup="true"> <span class="m-menu__link"> <span class="m-menu__link-text" style="font-family: 'Roboto', sans-serif;"> Create Buttons </span> </span> </li>
                <li class="m-menu__item " aria-haspopup="true"> <a  href="../buttons/" class="m-menu__link "> <i class="m-menu__link-bullet m-menu__link-bullet--dot"> <span></span> </i> <span class="m-menu__link-text" style="font-family: 'Roboto', sans-serif;"> Add Buttons </span> </a> </li>
                <li class="m-menu__item " aria-haspopup="true"> <a  href="../buttons/jacket.php" class="m-menu__link "> <i class="m-menu__link-bullet m-menu__link-bullet--dot"> <span></span> </i> <span class="m-menu__link-text" style="font-family: 'Roboto', sans-serif;"> View Jacket Buttons </span> </a> </li>
                <li class="m-menu__item " aria-haspopup="true"> <a  href="../buttons/overcoat.php" class="m-menu__link "> <i class="m-menu__link-bullet m-menu__link-bullet--dot"> <span></span> </i> <span class="m-menu__link-text" style="font-family: 'Roboto', sans-serif;"> View Overcoat Buttons </span> </a> </li>
                <li class="m-menu__item " aria-haspopup="true"> <a  href="../buttons/pants.php" class="m-menu__link "> <i class="m-menu__link-bullet m-menu__link-bullet--dot"> <span></span> </i> <span class="m-menu__link-text" style="font-family: 'Roboto', sans-serif;"> View Pants Buttons </span> </a> </li>
                <li class="m-menu__item " aria-haspopup="true"> <a  href="../buttons/shirt.php" class="m-menu__link "> <i class="m-menu__link-bullet m-menu__link-bullet--dot"> <span></span> </i> <span class="m-menu__link-text" style="font-family: 'Roboto', sans-serif;"> View Shirt Buttons </span> </a> </li>
                <li class="m-menu__item " aria-haspopup="true"> <a  href="../buttons/suit.php" class="m-menu__link "> <i class="m-menu__link-bullet m-menu__link-bullet--dot"> <span></span> </i> <span class="m-menu__link-text" style="font-family: 'Roboto', sans-serif;"> View Suit Buttons </span> </a> </li>
                <li class="m-menu__item " aria-haspopup="true"> <a  href="../buttons/vest.php" class="m-menu__link "> <i class="m-menu__link-bullet m-menu__link-bullet--dot"> <span></span> </i> <span class="m-menu__link-text" style="font-family: 'Roboto', sans-serif;"> View Vest Buttons </span> </a> </li>
              </ul>
            </div>
          </li>
          <li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true" m-menu-submenu-toggle="hover"> <a  href="../orderform/" class="m-menu__link m-menu__toggle"> <span class="m-menu__link-text" style="font-family: 'Roboto', sans-serif;"> Update Order Form </span> </a> </li>
          <li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true" m-menu-submenu-toggle="hover"> <a  href="javascript:;" class="m-menu__link m-menu__toggle"> <span class="m-menu__link-text" style="font-family: 'Roboto', sans-serif;"> Create Reseller </span> </a>
            <div class="m-menu__submenu "> <span class="m-menu__arrow"></span>
              <ul class="m-menu__subnav">
                <li class="m-menu__item  m-menu__item--parent" aria-haspopup="true"> <span class="m-menu__link"> <span class="m-menu__link-text" style="font-family: 'Roboto', sans-serif;"> Create Lining </span> </span> </li>
                <li class="m-menu__item " aria-haspopup="true"> <a  href="../reseller/" class="m-menu__link "> <i class="m-menu__link-bullet m-menu__link-bullet--dot"> <span></span> </i> <span class="m-menu__link-text" style="font-family: 'Roboto', sans-serif;"> Add Reseller </span> </a> </li>
                <li class="m-menu__item " aria-haspopup="true"> <a  href="../reseller/view.php" class="m-menu__link "> <i class="m-menu__link-bullet m-menu__link-bullet--dot"> <span></span> </i> <span class="m-menu__link-text" style="font-family: 'Roboto', sans-serif;"> View Reseller </span> </a> </li>
              </ul>
            </div>
          </li>
          <? if($row_user['admin_status_orders'] == 'T') { ?>
          <li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true" m-menu-submenu-toggle="hover"> <a  href="../orders/" class="m-menu__link m-menu__toggle"> <span class="m-menu__link-text" style="font-family: 'Roboto', sans-serif;"> Orders </span> </a> </li>
          <li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true" m-menu-submenu-toggle="hover"> <a  href="../inprocessorders/" class="m-menu__link m-menu__toggle"> <span class="m-menu__link-text" style="font-family: 'Roboto', sans-serif;"> In-Process Orders </span> </a> </li>
          <? } else if($row_user['admin_status_orders'] == '') { } ?>
          <? if($row_user['admin_status_reports'] == 'T') { ?>
          <li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true" m-menu-submenu-toggle="hover"> <a  href="javascript:;" class="m-menu__link m-menu__toggle"> <span class="m-menu__link-text" style="font-family: 'Roboto', sans-serif;"> Reports </span> </a>
            <div class="m-menu__submenu "> <span class="m-menu__arrow"></span>
              <ul class="m-menu__subnav">
                <li class="m-menu__item  m-menu__item--parent" aria-haspopup="true"> <span class="m-menu__link"> <span class="m-menu__link-text" style="font-family: 'Roboto', sans-serif;"> Create Lining </span> </span> </li>
                <li class="m-menu__item " aria-haspopup="true"> <a  href="../report/" class="m-menu__link "> <i class="m-menu__link-bullet m-menu__link-bullet--dot"> <span></span> </i> <span class="m-menu__link-text" style="font-family: 'Roboto', sans-serif;"> Report </span> </a> </li>
                <li class="m-menu__item " aria-haspopup="true"> <a  href="../categorywise/" class="m-menu__link "> <i class="m-menu__link-bullet m-menu__link-bullet--dot"> <span></span> </i> <span class="m-menu__link-text" style="font-family: 'Roboto', sans-serif;"> Categorywise Sales Report </span> </a> </li>
              </ul>
            </div>
          </li>
          <? } else if($row_user['admin_status_reports'] == '') { } ?>
          <? if($row_user['admin_status_subuser'] == '') { ?>
          <li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true" m-menu-submenu-toggle="hover"> <a  href="javascript:;" class="m-menu__link m-menu__toggle"> <span class="m-menu__link-text" style="font-family: 'Roboto', sans-serif;"> Create Sub User </span> </a>
            <div class="m-menu__submenu "> <span class="m-menu__arrow"></span>
              <ul class="m-menu__subnav">
                <li class="m-menu__item  m-menu__item--parent" aria-haspopup="true"> <span class="m-menu__link"> <span class="m-menu__link-text" style="font-family: 'Roboto', sans-serif;"> Create Lining </span> </span> </li>
                <li class="m-menu__item " aria-haspopup="true"> <a  href="../subuser/" class="m-menu__link "> <i class="m-menu__link-bullet m-menu__link-bullet--dot"> <span></span> </i> <span class="m-menu__link-text" style="font-family: 'Roboto', sans-serif;"> Add Sub User </span> </a> </li>
                <li class="m-menu__item " aria-haspopup="true"> <a  href="../subuser/view.php" class="m-menu__link "> <i class="m-menu__link-bullet m-menu__link-bullet--dot"> <span></span> </i> <span class="m-menu__link-text" style="font-family: 'Roboto', sans-serif;"> View Sub User </span> </a> </li>
              </ul>
            </div>
          </li>
          <? } else if($row_user['admin_status_subuser'] == 'T') { } ?>
          <li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true" m-menu-submenu-toggle="hover"> <a  href="../logout/" class="m-menu__link m-menu__toggle"> <span class="m-menu__link-text" style="font-family: 'Roboto', sans-serif; color:#F00;"> LOGOUT </span> </a> </li>
        </ul>
      </div>
      <!-- END: Aside Menu -->
    </div>
