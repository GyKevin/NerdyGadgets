## How to import navbar and footer into your page:

1. copy + paste this into the header:
```html
    <link rel="stylesheet" href="/navbar/navbar.css">
    <script src="https://kit.fontawesome.com/d44308875f.js" crossorigin="anonymous"></script>
    <script src="/navbar/import-handler.js"></script>
    <style>
        body {
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }
        main {
            padding-top: 55px;
        }
        #footer {
            margin-top: auto;
        }
    </style>
```
2. copy + paste the following divs into the body
```html
    <!-- navigatie bar -->
    <div id="navbar"></div>
    <!-- content -->
    <main>
        
    </main>
    <!-- footer -->
    <div id="footer"></div>
```
### Thats it!
Note:
1. you might have to change the source of the stylesheet and the script
2. anything and everything you want to put on the page, goes in the ```<main> </main>``` element
