to install it main requirement is
1. I have Custom Core Controller which seperate both frontend and backend
2. models Dataload.php 
3. Search  Controller
4. View for ajax load
5. is_login() , sanitize() functions are the part of core module. so to work properly you have to go through core module that is extends by each controller
6. Im using mysql table view to save previous search records and fetch data from view as it is faster than directly extract from database using complex sql quieries.
7. any feedback will be great for me to improve my code.
