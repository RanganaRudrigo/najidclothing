<header class="navbar navbar-fixed-top" role="banner">    <div class="container-fluid">        <div class="navbar-header" style="padding: 8px 10px;">            <font style="font-size: 18px;color: whitesmoke;" >                <?= TITLE ?> :: Admin            </font>        </div>        <ul class="nav navbar-nav navbar-right">            <li ><a href="javascript:void(0)"  id="counter" style='font:700 15px arial, sans-serif;' >   </a></li>            <li ><a  class="visible-lg"  href="javascript:void(0)"  id="timer" >   </a></li>            <li ><a class="visible-lg"  href="javascript:void(0)"   > Login as <?= ucfirst($this->session->userdata('user')->name) ?>  </a></li>            <li class="user_menu">                <a href="#" class="dropdown-toggle" data-toggle="dropdown">                    <span class="navbar_el_icon ion-person"></span> <span class="caret"></span>                </a>                <ul class="dropdown-menu dropdown-menu-right">                    <li><a href="#" id="logout" data-for="">Log Out</a></li>                </ul>            </li>        </ul>    </div></header>