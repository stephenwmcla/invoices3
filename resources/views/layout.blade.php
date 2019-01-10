<!DOCTYPE html>
<html>
    <head>
        {!! HTML::style('css/styles.css') !!}
        <title>Invoices</title>
    </head>
    <body>
        <div class="container">
            <div id="la_header">
                <div class="typeface">MCALEER COMPUTING</div>
            </div>
            <div id='sidebar' class='sidebar' >
                <div class='welcomeText'>
                    <h3>Invoicing</h3>
                </div>
                <div class='menucopyright'>
                    This site is copyright (c) 2006 - <?php echo date('Y'); ?> McAleer Computing
                </div>
                <br/>
                <div id='menubardiv'>
                    @include('menu')
                </div>
            </div>
            <div class='mainbar' class='mainbar'>
                @yield('content')
            </div>
            <div class="bottomBar">
                <div style="float:left; width:300px;height:100px;padding-left:15px">
                    This Site is Copyright &copy; 2006 - <?php echo date('Y'); ?> McAleer Computing<br/>
                </div>
            </div>
        </div>
    </body>
</html>