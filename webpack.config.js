const path = require('path');
const CopyWebpackPlugin = require('copy-webpack-plugin');
const MiniCssExtractPlugin = require('mini-css-extract-plugin');

module.exports = {
    mode: 'production',

    entry: {
        bundle: path.resolve(__dirname, 'src/index.js'),
    },

    output: {
        path: path.resolve(__dirname, 'dist'),
        filename: '[name].[contenthash].js',
        clean: true,
        assetModuleFilename: 'assets/[name][ext]',
    },

    devServer: {
        static: {
            directory: path.resolve(__dirname, 'dist')
        },
        port: 3000,
        open: true,
        hot: true,
        compress: true,
    },

    module: {
        rules: [
            {
                test: /\.css$/,
                use: [
                    MiniCssExtractPlugin.loader,
                    'css-loader',
                    {
                        loader: 'postcss-loader',
                        options: {
                            postcssOptions: {
                                plugins: [
                                    require('cssnano')({
                                        preset: 'default',
                                    }),
                                ],
                            },
                        },
                    },
                ],
            },
            {
                test: /\.(png|jpg|jpeg|gif|svg)$/i,
                type: 'asset/resource',
                parser: {
                    dataUrlCondition: {
                        maxSize: 8 * 1024,
                    },
                },
            },
        ],
    },

    plugins: [
        new MiniCssExtractPlugin({
            filename: '[name].css',
        }),
        new CopyWebpackPlugin({
            patterns: [
            {
                from: path.resolve(__dirname, 'src/backend'),
                to: path.resolve(__dirname, 'dist/backend'),
            },
            ],
        }),
    ],
}