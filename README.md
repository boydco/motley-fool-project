# Motley Fool Stock Advisor - Project

Getting Started

# Simple Start

From a fresh Wordpress installation, do the following:

1. Download project file from Github and Unzip project file

2. From Wordpress Dashboard, go to Themes and Upload new Theme, select 'stock_advisor_theme.zip' file from project files and activate.

3. Go to main Plugins admin page, add plugin and upload the motley-fool-stock-advisor-plugin.zip file and then activate.

4. Import sample data - go to Tools on dashboard menu and then Import. Install Wordpress importer (if not installed) and then hit Run Importer. Choose file and select the 'motley-fool-stock-advisor-sample-data.xml' file and create a new user when prompted.

# Alternative Route

1. Upload the stock_advisor folder to the themes folder of the website

2. Upload the motley-fool-stock-advisor folder to the plugins folder 

3. Under the Themes and Plugins, activate both of those

4. To import sample data - follow step 4 above.

# To Develop on Theme

**assumes latest Node is installed

To develop the theme, open up the stock_advisor theme in a terminal and run the following commands.

npm install

and npm run watch to develop.

See package.json for more cli options