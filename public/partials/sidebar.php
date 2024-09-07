<?php
    if (!empty($_SESSION['lang'])) {
        $sessionLang = $_SESSION['lang'];
        require_once ('assets/lang-php/'.$sessionLang.'.php');
    } else {
        require_once ('assets/lang-php/en.php');
    }
?>
<!-- ========== Left Sidebar Start ========== -->
<div class="vertical-menu">

    <div data-simplebar class="h-100">

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">
                <li class="menu-title" key="t-menu"><?php echo $lang["Menu"]; ?></li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="bx bx-home-circle"></i>
                        <span key="t-dashboards"><?php echo $lang["Dashboard"]; ?></span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="index.php" key="t-default"><?php echo $lang["Default"]; ?></a></li>
                        <li><a href="dashboard-saas.php" key="t-saas"><?php echo $lang["Saas"]; ?></a></li>
                        <li><a href="dashboard-crypto.php" key="t-crypto"><?php echo $lang["Crypto"]; ?></a></li>
                        <li><a href="dashboard-blog.php" key="t-blog"><?php echo $lang["Blog"]; ?></a></li>
                        <li><a href="dashboard-job.php" key="t-jobs"><?php echo $lang["Jobs"]; ?></a></li>
                    </ul>
                </li>

                <li>
                    <a href="javascript: void(0);" class="waves-effect">
                        <span class="badge rounded-pill bg-danger float-end" key="t-hot"><?php echo $lang["Hot"]; ?></span>
                        <i class="bx bx-layout"></i>
                        <span key="t-layouts"><?php echo $lang["Layouts"]; ?></span>
                    </a>
                    <ul class="sub-menu" aria-expanded="true">
                        <li>
                            <a href="javascript: void(0);" class="has-arrow" key="t-vertical"><?php echo $lang["Vertical"]; ?></a>
                            <ul class="sub-menu" aria-expanded="true">
                                <li><a href="layouts-light-sidebar.php" key="t-light-sidebar"><?php echo $lang["Light_Sidebar"]; ?></a></li>
                                <li><a href="layouts-compact-sidebar.php" key="t-compact-sidebar"><?php echo $lang["Compact_Sidebar"]; ?></a></li>
                                <li><a href="layouts-icon-sidebar.php" key="t-icon-sidebar"><?php echo $lang["Icon_Sidebar"]; ?></a></li>
                                <li><a href="layouts-boxed.php" key="t-boxed-width"><?php echo $lang["Boxed_Width"]; ?></a></li>
                                <li><a href="layouts-preloader.php" key="t-preloader"><?php echo $lang["Preloader"]; ?></a></li>
                                <li><a href="layouts-colored-sidebar.php" key="t-colored-sidebar"><?php echo $lang["Colored_Sidebar"]; ?></a></li>
                                <li><a href="layouts-scrollable.php" key="t-scrollable"><?php echo $lang["Scrollable"]; ?></a></li>
                            </ul>
                        </li>

                        <li>
                            <a href="javascript: void(0);" class="has-arrow" key="t-horizontal"><?php echo $lang["Horizontal"]; ?></a>
                            <ul class="sub-menu" aria-expanded="true">
                                <li><a href="layouts-horizontal.php" key="t-horizontal"><?php echo $lang["Horizontal"]; ?></a></li>
                                <li><a href="layouts-hori-topbar-light.php" key="t-topbar-light"><?php echo $lang["Topbar_Light"]; ?></a></li>
                                <li><a href="layouts-hori-boxed-width.php" key="t-boxed-width"><?php echo $lang["Boxed_Width"]; ?></a></li>
                                <li><a href="layouts-hori-preloader.php" key="t-preloader"><?php echo $lang["Preloader"]; ?></a></li>
                                <li><a href="layouts-hori-colored-header.php" key="t-colored-topbar"><?php echo $lang["Colored_Header"]; ?></a></li>
                                <li><a href="layouts-hori-scrollable.php" key="t-scrollable"><?php echo $lang["Scrollable"]; ?></a></li>
                            </ul>
                        </li>
                    </ul>
                </li>

                <li class="menu-title" key="t-apps"><?php echo $lang["Apps"]; ?></li>

                

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="bx bx-calendar"></i>
                        <span key="t-dashboards"><?php echo $lang["Calendars"]; ?></span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="calendar.php" key="t-tui-calendar"><?php echo $lang["TUI_Calendar"]; ?></a></li>
                        <li><a href="calendar-full.php" key="t-full-calendar"><?php echo $lang["Full_Calendar"]; ?></a></li>
                    </ul>
                </li>

                <li>
                    <a href="chat.php" class="waves-effect">
                        <i class="bx bx-chat"></i>
                        <span key="t-chat"><?php echo $lang["Chat"]; ?></span>
                    </a>
                </li>

                <li>
                    <a href="apps-filemanager.php" class="waves-effect">
                        <i class="bx bx-file"></i>
                        <span key="t-file-manager"><?php echo $lang["File_Manager"]; ?></span>
                    </a>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="bx bx-store"></i>
                        <span key="t-ecommerce"><?php echo $lang["Ecommerce"]; ?></span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="ecommerce-products.php" key="t-products"><?php echo $lang["Products"]; ?></a></li>
                        <li><a href="ecommerce-product-detail.php" key="t-product-detail"><?php echo $lang["Product_Detail"]; ?></a></li>
                        <li><a href="ecommerce-orders.php" key="t-orders"><?php echo $lang["Orders"]; ?></a></li>
                        <li><a href="ecommerce-customers.php" key="t-customers"><?php echo $lang["Customers"]; ?></a></li>
                        <li><a href="ecommerce-cart.php" key="t-cart"><?php echo $lang["Cart"]; ?></a></li>
                        <li><a href="ecommerce-checkout.php" key="t-checkout"><?php echo $lang["Checkout"]; ?></a></li>
                        <li><a href="ecommerce-shops.php" key="t-shops"><?php echo $lang["Shops"]; ?></a></li>
                        <li><a href="ecommerce-add-product.php" key="t-add-product"><?php echo $lang["Add_Product"]; ?></a></li>
                    </ul>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="bx bx-bitcoin"></i>
                        <span key="t-crypto"><?php echo $lang["Crypto"]; ?></span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="crypto-wallet.php" key="t-wallet"><?php echo $lang["Wallet"]; ?></a></li>
                        <li><a href="crypto-buy-sell.php" key="t-buy"><?php echo $lang["Buy_Sell"]; ?></a></li>
                        <li><a href="crypto-exchange.php" key="t-exchange"><?php echo $lang["Exchange"]; ?></a></li>
                        <li><a href="crypto-lending.php" key="t-lending"><?php echo $lang["Lending"]; ?></a></li>
                        <li><a href="crypto-orders.php" key="t-orders"><?php echo $lang["Orders"]; ?></a></li>
                        <li><a href="crypto-kyc-application.php" key="t-kyc"><?php echo $lang["KYC_Application"]; ?></a></li>
                        <li><a href="crypto-ico-landing.php" key="t-ico"><?php echo $lang["ICO_Landing"]; ?></a></li>
                    </ul>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="bx bx-envelope"></i>
                        <span key="t-email"><?php echo $lang["Email"]; ?></span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="email-inbox.php" key="t-inbox"><?php echo $lang["Inbox"]; ?></a></li>
                        <li><a href="email-read.php" key="t-read-email"><?php echo $lang["Read_Email"]; ?></a></li>
                        <li>
                            <a href="javascript: void(0);">
                                <span key="t-email-templates"><?php echo $lang["Templates"]; ?></span>
                            </a>
                            <ul class="sub-menu" aria-expanded="true">
                                <li><a href="email-template-basic.php" key="t-basic-action"><?php echo $lang["Basic_Action"]; ?></a></li>
                                <li><a href="email-template-alert.php" key="t-alert-email"><?php echo $lang["Alert_Email"]; ?></a></li>
                                <li><a href="email-template-billing.php" key="t-bill-email"><?php echo $lang["Billing_Email"]; ?></a></li>
                            </ul>
                        </li>
                    </ul>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="bx bx-receipt"></i>
                        <span key="t-invoices"><?php echo $lang["Invoices"]; ?></span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="invoices-list.php" key="t-invoice-list"><?php echo $lang["Invoice_List"]; ?></a></li>
                        <li><a href="invoices-detail.php" key="t-invoice-detail"><?php echo $lang["Invoice_Detail"]; ?></a></li>
                    </ul>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="bx bx-briefcase-alt-2"></i>
                        <span key="t-projects"><?php echo $lang["Projects"]; ?></span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="projects-grid.php" key="t-p-grid"><?php echo $lang["Projects_Grid"]; ?></a></li>
                        <li><a href="projects-list.php" key="t-p-list"><?php echo $lang["Projects_List"]; ?></a></li>
                        <li><a href="projects-overview.php" key="t-p-overview"><?php echo $lang["Project_Overview"]; ?></a></li>
                        <li><a href="projects-create.php" key="t-create-new"><?php echo $lang["Create_New"]; ?></a></li>
                    </ul>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="bx bx-task"></i>
                        <span key="t-tasks"><?php echo $lang["Tasks"]; ?></span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="tasks-list.php" key="t-task-list"><?php echo $lang["Task_List"]; ?></a></li>
                        <li><a href="tasks-kanban.php" key="t-kanban-board"><?php echo $lang["Kanban_Board"]; ?></a></li>
                        <li><a href="tasks-create.php" key="t-create-task"><?php echo $lang["Create_Task"]; ?></a></li>
                    </ul>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="bx bxs-user-detail"></i>
                        <span key="t-contacts"><?php echo $lang["Contacts"]; ?></span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="contacts-grid.php" key="t-user-grid"><?php echo $lang["User_Grid"]; ?></a></li>
                        <li><a href="contacts-list.php" key="t-user-list"><?php echo $lang["User_List"]; ?></a></li>
                        <li><a href="contacts-profile.php" key="t-profile"><?php echo $lang["Profile"]; ?></a></li>
                    </ul>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="bx bx-detail"></i>
                        <span key="t-blog"><?php echo $lang["Blog"]; ?></span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="blog-list.php" key="t-blog-list"><?php echo $lang["Blog_List"]; ?></a></li>
                        <li><a href="blog-grid.php" key="t-blog-grid"><?php echo $lang["Blog_Grid"]; ?></a></li>
                        <li><a href="blog-details.php" key="t-blog-details"><?php echo $lang["Blog_Details"]; ?></a></li>
                    </ul>
                </li>

                <li>
                    <a href="javascript: void(0);" class="waves-effect has-arrow">
                        <i class="bx bx-briefcase-alt"></i>
                        <span key="t-jobs"><?php echo $lang["Jobs"]; ?></span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="job-list.php" key="t-job-list"><?php echo $lang["Job_List"]; ?></a></li>
                        <li><a href="job-grid.php" key="t-job-grid"><?php echo $lang["Job_Grid"]; ?></a></li>
                        <li><a href="job-apply.php" key="t-apply-job"><?php echo $lang["Apply_Job"]; ?></a></li>
                        <li><a href="job-details.php" key="t-job-details"><?php echo $lang["Job_Details"]; ?></a></li>
                        <li><a href="job-categories.php" key="t-Jobs-categories"><?php echo $lang["Jobs_Categories"]; ?></a></li>
                        <li>
                            <a href="javascript: void(0);" class="has-arrow" key="t-candidate"><?php echo $lang["Candidate"]; ?></a>
                            <ul class="sub-menu" aria-expanded="true">
                                <li><a href="candidate-list.php" key="t-list"><?php echo $lang["List"]; ?></a></li>
                                <li><a href="candidate-overview.php" key="t-overview"><?php echo $lang["Overview"]; ?></a></li>
                            </ul>
                        </li>
                    </ul>
                </li>

                <li class="menu-title" key="t-pages"><?php echo $lang["Pages"]; ?></li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="bx bx-user-circle"></i>
                        <span key="t-authentication"><?php echo $lang["Authentication"]; ?></span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="auth-login.php" key="t-login"><?php echo $lang["Login"]; ?></a></li>
                        <li><a href="auth-login-2.php" key="t-login-2"><?php echo $lang["Login_2"]; ?></a></li>
                        <li><a href="auth-register.php" key="t-register"><?php echo $lang["Register"]; ?></a></li>
                        <li><a href="auth-register-2.php" key="t-register-2"><?php echo $lang["Register_2"]; ?></a></li>
                        <li><a href="auth-recoverpw.php" key="t-recover-password"><?php echo $lang["Recover_Password"]; ?></a></li>
                        <li><a href="auth-recoverpw-2.php" key="t-recover-password-2"><?php echo $lang["Recover_Password_2"]; ?></a></li>
                        <li><a href="auth-lock-screen.php" key="t-lock-screen"><?php echo $lang["Lock_Screen"]; ?></a></li>
                        <li><a href="auth-lock-screen-2.php" key="t-lock-screen-2"><?php echo $lang["Lock_Screen_2"]; ?></a></li>
                        <li><a href="auth-confirm-mail.php" key="t-confirm-mail"><?php echo $lang["Confirm_Email"]; ?></a></li>
                        <li><a href="auth-confirm-mail-2.php" key="t-confirm-mail-2"><?php echo $lang["Confirm_Email_2"]; ?></a></li>
                        <li><a href="auth-email-verification.php" key="t-email-verification"><?php echo $lang["Email_verification"]; ?></a></li>
                        <li><a href="auth-email-verification-2.php" key="t-email-verification-2"><?php echo $lang["Email_Verification_2"]; ?></a></li>
                        <li><a href="auth-two-step-verification.php" key="t-two-step-verification"><?php echo $lang["Two_Step_Verification"]; ?></a></li>
                        <li><a href="auth-two-step-verification-2.php" key="t-two-step-verification-2"><?php echo $lang["Two_Step_Verification_2"]; ?></a></li>
                    </ul>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="bx bx-file"></i>
                        <span key="t-utility"><?php echo $lang["Utility"]; ?></span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="pages-starter.php" key="t-starter-page"><?php echo $lang["Starter_Page"]; ?></a></li>
                        <li><a href="pages-maintenance.php" key="t-maintenance"><?php echo $lang["Maintenance"]; ?></a></li>
                        <li><a href="pages-comingsoon.php" key="t-coming-soon"><?php echo $lang["Coming_Soon"]; ?></a></li>
                        <li><a href="pages-timeline.php" key="t-timeline"><?php echo $lang["Timeline"]; ?></a></li>
                        <li><a href="pages-faqs.php" key="t-faqs"><?php echo $lang["FAQs"]; ?></a></li>
                        <li><a href="pages-pricing.php" key="t-pricing"><?php echo $lang["Pricing"]; ?></a></li>
                        <li><a href="pages-404.php" key="t-error-404"><?php echo $lang["Error_404"]; ?></a></li>
                        <li><a href="pages-500.php" key="t-error-500"><?php echo $lang["Error_500"]; ?></a></li>
                    </ul>
                </li>

                <li class="menu-title" key="t-components"><?php echo $lang["Components"]; ?></li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="bx bx-tone"></i>
                        <span key="t-ui-elements"><?php echo $lang["UI_Elements"]; ?></span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="ui-alerts.php" key="t-alerts"><?php echo $lang["Alerts"]; ?></a></li>
                        <li><a href="ui-buttons.php" key="t-buttons"><?php echo $lang["Buttons"]; ?></a></li>
                        <li><a href="ui-cards.php" key="t-cards"><?php echo $lang["Cards"]; ?></a></li>
                        <li><a href="ui-carousel.php" key="t-carousel"><?php echo $lang["Carousel"]; ?></a></li>
                        <li><a href="ui-dropdowns.php" key="t-dropdowns"><?php echo $lang["Dropdowns"]; ?></a></li>
                        <li><a href="ui-grid.php" key="t-grid"><?php echo $lang["Grid"]; ?></a></li>
                        <li><a href="ui-images.php" key="t-images"><?php echo $lang["Images"]; ?></a></li>
                        <li><a href="ui-lightbox.php" key="t-lightbox"><?php echo $lang["Lightbox"]; ?></a></li>
                        <li><a href="ui-modals.php" key="t-modals"><?php echo $lang["Modals"]; ?></a></li>
                        <li><a href="ui-offcanvas.php" key="t-offcanvas"><?php echo $lang["Offcanvas"]; ?></a></li>
                        <li><a href="ui-rangeslider.php" key="t-range-slider"><?php echo $lang["Range_Slider"]; ?></a></li>
                        <li><a href="ui-session-timeout.php" key="t-session-timeout"><?php echo $lang["Session_Timeout"]; ?></a></li>
                        <li><a href="ui-progressbars.php" key="t-progress-bars"><?php echo $lang["Progress_Bars"]; ?></a></li>
                        <li><a href="ui-placeholders.php" key="t-placeholders"><?php echo $lang["Placeholders"]; ?></a></li>
                        <li><a href="ui-sweet-alert.php" key="t-sweet-alert"><?php echo $lang["Sweet_Alert"]; ?></a></li>
                        <li><a href="ui-tabs-accordions.php" key="t-tabs-accordions"><?php echo $lang["Tabs_&_Accordions"]; ?></a></li>
                        <li><a href="ui-typography.php" key="t-typography"><?php echo $lang["Typography"]; ?></a></li>
                        <li><a href="ui-toasts.php" key="t-toasts"><?php echo $lang["Toasts"]; ?></a></li>
                        <li><a href="ui-video.php" key="t-video"><?php echo $lang["Video"]; ?></a></li>
                        <li><a href="ui-general.php" key="t-general"><?php echo $lang["General"]; ?></a></li>
                        <li><a href="ui-colors.php" key="t-colors"><?php echo $lang["Colors"]; ?></a></li>
                        <li><a href="ui-rating.php" key="t-rating"><?php echo $lang["Rating"]; ?></a></li>
                        <li><a href="ui-notifications.php" key="t-notifications"><?php echo $lang["Notifications"]; ?></a></li>
                        <li><a href="ui-utilities.php" key="t-utilities"><?php echo $lang["Utilities"]; ?></a></li>
                    </ul>
                </li>

                <li>
                    <a href="javascript: void(0);" class="waves-effect">
                        <i class="bx bxs-eraser"></i>
                        <span class="badge rounded-pill bg-danger float-end">10</span>
                        <span key="t-forms"><?php echo $lang["Forms"]; ?></span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="form-elements.php" key="t-form-elements"><?php echo $lang["Form_Elements"]; ?></a></li>
                        <li><a href="form-layouts.php" key="t-form-layouts"><?php echo $lang["Form_Layouts"]; ?></a></li>
                        <li><a href="form-validation.php" key="t-form-validation"><?php echo $lang["Form_Validation"]; ?></a></li>
                        <li><a href="form-advanced.php" key="t-form-advanced"><?php echo $lang["Form_Advanced"]; ?></a></li>
                        <li><a href="form-editors.php" key="t-form-editors"><?php echo $lang["Form_Editors"]; ?></a></li>
                        <li><a href="form-uploads.php" key="t-form-upload"><?php echo $lang["Form_File_Upload"]; ?></a></li>
                        <li><a href="form-xeditable.php" key="t-form-xeditable"><?php echo $lang["Form_Xeditable"]; ?></a></li>
                        <li><a href="form-repeater.php" key="t-form-repeater"><?php echo $lang["Form_Repeater"]; ?></a></li>
                        <li><a href="form-wizard.php" key="t-form-wizard"><?php echo $lang["Form_Wizard"]; ?></a></li>
                        <li><a href="form-mask.php" key="t-form-mask"><?php echo $lang["Form_Mask"]; ?></a></li>
                    </ul>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="bx bx-list-ul"></i>
                        <span key="t-tables"><?php echo $lang["Tables"]; ?></span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="tables-basic.php" key="t-basic-tables"><?php echo $lang["Basic_Tables"]; ?></a></li>
                        <li><a href="tables-datatable.php" key="t-data-tables"><?php echo $lang["Data_Tables"]; ?></a></li>
                        <li><a href="tables-responsive.php" key="t-responsive-table"><?php echo $lang["Responsive_Table"]; ?></a></li>
                        <li><a href="tables-editable.php" key="t-editable-table"><?php echo $lang["Editable_Table"]; ?></a></li>
                    </ul>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="bx bxs-bar-chart-alt-2"></i>
                        <span key="t-charts"><?php echo $lang["Charts"]; ?></span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="charts-apex.php" key="t-apex-charts"><?php echo $lang["Apex_Charts"]; ?></a></li>
                        <li><a href="charts-echart.php" key="t-e-charts"><?php echo $lang["E_Charts"]; ?></a></li>
                        <li><a href="charts-chartjs.php" key="t-chartjs-charts"><?php echo $lang["Chartjs_Charts"]; ?></a></li>
                        <li><a href="charts-flot.php" key="t-flot-charts"><?php echo $lang["Flot_Charts"]; ?></a></li>
                        <li><a href="charts-tui.php" key="t-ui-charts"><?php echo $lang["Toast_UI_Charts"]; ?></a></li>
                        <li><a href="charts-knob.php" key="t-knob-charts"><?php echo $lang["Jquery_Knob_Charts"]; ?></a></li>
                        <li><a href="charts-sparkline.php" key="t-sparkline-charts"><?php echo $lang["Sparkline_Charts"]; ?></a></li>
                    </ul>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="bx bx-aperture"></i>
                        <span key="t-icons"><?php echo $lang["Icons"]; ?></span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="icons-boxicons.php" key="t-boxicons"><?php echo $lang["Boxicons"]; ?></a></li>
                        <li><a href="icons-materialdesign.php" key="t-material-design"><?php echo $lang["Material_Design"]; ?></a></li>
                        <li><a href="icons-dripicons.php" key="t-dripicons"><?php echo $lang["Dripicons"]; ?></a></li>
                        <li><a href="icons-fontawesome.php" key="t-font-awesome"><?php echo $lang["Font_Awesome"]; ?></a></li>
                    </ul>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="bx bx-map"></i>
                        <span key="t-maps"><?php echo $lang["Maps"]; ?></span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="maps-google.php" key="t-g-maps"><?php echo $lang["Google_Maps"]; ?></a></li>
                        <li><a href="maps-vector.php" key="t-v-maps"><?php echo $lang["Vector_Maps"]; ?></a></li>
                        <li><a href="maps-leaflet.php" key="t-l-maps"><?php echo $lang["Leaflet_Maps"]; ?></a></li>
                    </ul>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="bx bx-share-alt"></i>
                        <span key="t-multi-level"><?php echo $lang["Multi_Level"]; ?></span>
                    </a>
                    <ul class="sub-menu" aria-expanded="true">
                        <li><a href="javascript: void(0);" key="t-level-1-1"><?php echo $lang["Level_1.1"]; ?></a></li>
                        <li>
                            <a href="javascript: void(0);" class="has-arrow" key="t-level-1-2"><?php echo $lang["Level_1.2"]; ?></a>
                            <ul class="sub-menu" aria-expanded="true">
                                <li><a href="javascript: void(0);" key="t-level-2-1"><?php echo $lang["Level_2.1"]; ?></a></li>
                                <li><a href="javascript: void(0);" key="t-level-2-2"><?php echo $lang["Level_2.2"]; ?></a></li>
                            </ul>
                        </li>
                    </ul>
                </li>

            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>
<!-- Left Sidebar End -->