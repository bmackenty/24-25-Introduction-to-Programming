<!DOCTYPE html>
<html lang="en">
<head>
    <!-- 
    The <!DOCTYPE html> declaration defines that this document is an HTML5 document. 
    It tells the browser how to interpret the code.
    -->

    <!-- 
    The <html> tag is the root element of an HTML page. 
    The "lang" attribute defines the language of the page (in this case, English).
    -->
  
    <head>
        <!-- 
        The <meta> tag provides metadata about the HTML document.
        The "charset" meta tag specifies the character encoding for the document. "UTF-8" is a universal character set that supports most characters in the world.
        -->
        <meta charset="UTF-8">

        <!-- 
        The <meta name="viewport"> tag ensures the page is responsive. 
        The "width=device-width" sets the width of the page to follow the screen width of the device. 
        The "initial-scale=1.0" ensures the initial zoom level is set correctly.
        -->
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <!-- 
        The <title> tag specifies the title of the page, which is displayed in the browser tab.
        -->
        <title>Basic Layout</title>

        <!-- 
        The <link> tag is used to include an external CSS file that will style the HTML elements. 
        In this case, it links to "style.css".
        -->
        <link rel="stylesheet" href="style.css">
    </head>

    <body>
        <!-- 
        The <body> tag defines the main content of the HTML page. All visible elements go inside the <body> tag.
        -->

        <!-- 
        The <header> tag defines a header for the webpage, typically used for logos, titles, or navigation links.
        Inside it, there's an <h1> tag, which is used for the main heading of the page.
        -->
        <header>
            <h1>Header</h1>
        </header>

        <!-- 
        The <nav> tag is used to define a navigation section of the webpage. 
        Typically, it contains links to different sections of the website.
        -->
        <nav>
            <!-- 
            The <ul> tag defines an unordered list. The list items (<li>) inside are the navigation links.
            -->
            <ul>
                <!-- 
                Each <li> tag represents an item in the list. Inside each list item, there is an <a> tag, 
                which creates a hyperlink. The href attribute specifies the destination of the link.
                In this case, they are placeholders with "#" because no actual page is linked.
                -->
                <li><a href="#">Home</a></li>
                <li><a href="#">About</a></li>
                <li><a href="#">Services</a></li>
                <li><a href="#">Contact</a></li>
            </ul>
        </nav>

        <!-- 
        The <main> tag represents the main content of the document. It contains the primary information for the webpage.
        Inside the <main> tag, there's an <h2> tag for a subheading and a <p> tag for a paragraph of text.
        -->
        <main>
            <h2>Main Content</h2>
            <p>This is where your main content goes.</p>
        </main>

        <!-- 
        The <footer> tag defines a footer for the webpage. It typically contains information about the website or contact details.
        -->
        <footer>
            <p>Footer content</p>
        </footer>
    </body>
</html>
