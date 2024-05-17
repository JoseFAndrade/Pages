# INF124ProjectTwo
Project Two for INF124 

Contributors: Jose Andrade jfandra1@uci.edu, Kevin Ngo kkngo3@uci.edu, Vincent Chow vhchow@uci.edu 



Requirements: 
    Ajax 
        - Done in the credit card number user input
                -made it so that if the user enters a pretty obviously fake credit card number it will be denied. Used a famous algorithm: Luhn algorithm.
        - used the zip folder given to us and implemented that. Will only auto fill for zip codes within that folder otherwise it will not
    Dynamically Loading
        - Did this for the Coffee Bags and Brewing at home pages. The data in those pages are dynamically filled in ( the items). The pages which the images connect to are not because if the item does not appear on that page then users will not know how to get over to the item page. There is no need to dynamically load in the page for the specific item. 
    Database
        - Database table design and creation
        - Prepared statements for site functionality
        - Database connection/query execution functions & helpers
    Form Submission
        - When user submits an order form, the data is sent to the database once validated 
        - Dynamically generated confirmation page after user submits order form