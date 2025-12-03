const path                     = require("path");
const fs                       = require('fs');
const glob                     = require("glob");
const MiniCssExtractPlugin     = require("mini-css-extract-plugin");
const CssMinimizerPlugin       = require("css-minimizer-webpack-plugin");
const RemoveEmptyScriptsPlugin = require('webpack-remove-empty-scripts');

// Create CSS entries.
function createCssEntries(folder, subfolder = "") {
    const files   = glob.sync(`${folder}/*.css`);
    const entries = {};
    files.forEach(file => {
        const name    = subfolder ? `${subfolder}/${path.basename(file, ".css")}` : path.basename(file, ".css");
        entries[name] = path.resolve(__dirname, file);
    });
    return entries;
}

const themeEntry   = { theme: path.resolve(__dirname, "src/css/theme.css") };
const blockEntries = createCssEntries("./src/css/blocks", "blocks");
const pageEntries  = createCssEntries("./src/css/pages", "pages");
const cssEntries   = { ...themeEntry, ...blockEntries, ...pageEntries };

// Create JS entries.
function createJsEntries(folder) {
	const files   = glob.sync(`${folder}/*.js`);
	const entries = {};
	files.forEach(file => {
		const name    = path.basename(file, ".js");
		entries[name] = path.resolve(__dirname, file);
	});
	return entries;
}

const jsEntries = createJsEntries("./src/js");

module.exports = {
	mode: "production",
	entry: { ...cssEntries, ...jsEntries },
	output: {
		path: path.resolve(__dirname, "assets"),
		filename: "js/[name].js",
	},
	module: {
		rules: [
			{
				test: /\.css$/,
				use: [
					MiniCssExtractPlugin.loader,
					"css-loader",
					"postcss-loader",
				],
			},
			{
				test: /\.js$/,
				exclude: /node_modules/,
				use: {
					loader: "babel-loader",
					options: { presets: ["@babel/preset-env"] },
				},
			},
		],
	},
	optimization: {
		minimize: true,
		minimizer: [
			`...`,
			new CssMinimizerPlugin(),
		],
	},
    plugins: [
		new MiniCssExtractPlugin({
			filename: (pathData) => {
				if (pathData.chunk.name === "theme") return "css/theme.css";
				if (pathData.chunk.name.startsWith("blocks/")) return `css/${pathData.chunk.name}.css`;
				if (pathData.chunk.name.startsWith("pages/")) return `css/${pathData.chunk.name}.css`;
				return `css/${pathData.chunk.name}.css`;
			},
		}),
		new RemoveEmptyScriptsPlugin(),
    ],
};
