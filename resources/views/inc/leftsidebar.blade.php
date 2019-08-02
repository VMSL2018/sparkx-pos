<?php
/**
 * Created by PhpStorm.
 * User: shovon
 * Date: 8/3/18
 * Time: 11:23 PM
 */

?>

<aside class="left-sidebar">
    <!-- Sidebar scroll-->
    <div class="scroll-sidebar">
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav">
            <ul id="sidebarnav">
                <li class="nav-small-cap">--- NAVIGATION</li>

                <li>
                    <a class="waves-effect waves-dark" href="/home" aria-expanded="false">
                        <i class="icon-Dashboard"></i>
                        <span class="hide-menu">
                            Dashboard
                            {{--Notification number--}}
                            {{--<span class="label label-rounded label-danger">4</span>--}}
                        </span>
                    </a>
                </li>

                <li>
                    <a class="waves-effect waves-dark" href="/pos" aria-expanded="false">
                        <i class="icon-Printer"></i>
                        <span class="hide-menu">
                            POS
                            {{--Notification number--}}
                            {{--<span class="label label-rounded label-danger">4</span>--}}
                        </span>
                    </a>
                </li>

                @if(Auth::user()->type == 1)
                    <li>
                        <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false">
                            <i class="icon-Box-Open"></i>
                            <span class="hide-menu">
                                Inventory
                                {{--Notification number--}}
                                {{--<span class="label label-rounded label-danger"></span>--}}
                            </span>
                        </a>
                        <ul aria-expanded="false" class="collapse">
                            <li><a href="/inventory/create">Add Products - Single</a></li>
                            <li><a href="/multiple">Add Products - Multi</a></li>
                            <li><a href="/transfer-product">Transfer Products</a></li>
                            <li><a href="/return">Return Products</a></li>
                            <li><a href="/damage">Damaged Products</a></li>
                            <li><a href="/lost">Lost Products</a></li>
                        </ul>
                    </li>
                @endif

                @if(Auth::user()->type == 1)
                <li>
                    <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false">
                        <i class="icon-Bar-Chart"></i>
                        <span class="hide-menu">
                            Reports
                            {{--Notification number--}}
                            {{--<span class="label label-rounded label-danger">4</span>--}}
                        </span>
                    </a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="/inventory">Inventory Register</a></li>
                        <li><a href="/productgroupreport">Product Group </a></li>
                        <li><a href="/salesreport">Sales</a></li>
                        <li><a href="/dailsalessummary">Sales Summary</a></li>
                        <li><a href="/mompurchasereport">MoM Purchase</a></li>
                        <li><a href="/suppliersalesreport">Supplier Sales</a></li>
                        <li><a href="/employeesalesreport">Employee Sales</a></li>
                        <li><a href="/employeedodsalesreport">Employee DoD Sales</a></li>
                        <li><a href="/salesincentivereport">Sales Incentive</a></li>
                        {{--<li><a href="/returnreport">Return</a></li>--}}
                        {{--<li><a href="/damagereport">Damage Report</a></li>--}}
                    </ul>
                </li>
                @endif
                @if(Auth::user()->type == 1)
                <li>
                    <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false">
                        <i class="icon-Data-Settings"></i>
                        <span class="hide-menu">
                            Settings
                            {{--Notification number--}}
                            {{--<span class="label label-rounded label-danger">4</span>--}}
                        </span>
                    </a>
                    <ul aria-expanded="false" class="collapse">
                        <!--<li><a href="/itemcode">Generate Item Code</a></li>-->
                        <li><a href="/user">User Management</a></li>  
                        <li><a href="/product">Product Group</a></li>
                        <li><a href="/showroom">Showroom Setup</a></li>
                        <li><a href="/warehouse">Warehouse Setup</a></li>
                        <li><a href="/settings">Bonus Setup</a></li>
                        <li><a href="/barcode">Print Barcode</a></li>
                    </ul>
                </li>
                @endif



                @if(Auth::user()->type == 1)
                    <li>
                        <a class="has-arrow waves-effect waves-dark" href="/supplier" aria-expanded="false">
                            <i class="icon-Truck"></i>
                            <span class="hide-menu">
                                Suppliers
                                {{--Notification number--}}
                                {{--<span class="label label-rounded label-danger">4</span>--}}
                            </span>
                        </a>
                        <ul aria-expanded="false" class="collapse">
                            <li><a href="/supplier">Suppliers List</a></li>
                            <li><a href="/supplier/create">Add a Supplier</a></li>
                        </ul>
                    </li>
                @endif

                @if(Auth::user()->type == 1)
                    {{--
                        <li>
                            <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false">
                                <i class="icon-Administrator"></i>
                                <span class="hide-menu">
                                    Customers
                                    {{--Notification number--}}
                                    {{--<span class="label label-rounded label-danger">4</span>--}}
                                </span>
                            </a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="/customer">Customer List</a></li>
                                <li><a href="/customer/create">Add a Customer</a></li>
                            </ul>
                        </li>
                    
                @endif

                @if(Auth::user()->type == 1)
                <li>
                    <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false">
                        <i class="icon-Business-Mens"></i>
                        <span class="hide-menu">
                            Employees
                            {{--Notification number--}}
                            {{--<span class="label label-rounded label-danger">4</span>--}}
                        </span>
                    </a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="/employee">Employee List</a></li>
                        <li><a href="/employee/create">Add Employee</a></li>
                    </ul>
                </li>
                @endif
            </ul>
        </nav>
        <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
</aside>
