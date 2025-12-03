# Blockplate WP 

Blockplate WP is a custom WordPress block-based theme. 

## Theme.json

## Build Process

The build process uses Webpack to compile and minify CSS and JavaScript files. There is a `webpack.config.js` file in the root of the theme that extends the default configuration. 

As of now, this repository does _not_ include the final built assets or blocks. You'll need to build them once you've cloned the repo. (You may also want to exclude them from your `.gitignore` file, depending on your workflow.)

Run `npm install` to install all of the dependencies.

`npm run build` will build the theme's CSS and JavaScript files.

`npm run start` will watch for changes to the theme's SCSS and JavaScript files partials and rebuild them automatically.

## File/Folder Structure

```
├── assets			<-- Theme files
│   ├── css 				<-- Compiled CSS files
│   ├── fonts				<-- Theme fonts
│   ├── images				<-- Theme images
│   ├── js				<-- Compiled JavaScript files
├── inc				<-- Theme includes and functions
│   ├── enqueue-blocks.php		<-- Enqueue block-specific styles
│   ├── enqueue.php			<-- Enqueue scripts and styles
│   ├── setup.php			<-- Theme setup
│   ├── woocommerce.php			<-- WooCommerce setup
├── parts 			<-- Custom block template parts
├── patterns 			<-- Custom block patterns
├── src				<-- Theme source files
│   ├── css 				<-- CSS source files
│   ├── js				<-- JavaScript source files
├── templates    		<-- Templates for the site editor
```

## License

Blockplate WP is licensed under the GNU General Public License v3.0 or later.

