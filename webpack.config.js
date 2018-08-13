var webpack = require('webpack')

module.exports = function(env) {
    return {
        entry: './src/tomochain/assets/js/app.js',
        output: {
            path: __dirname + '/src/tomochain/assets/dist',
            filename: 'bundle.js'
        },
        optimization: {
            minimize: true
        },
        module: {
            rules: [
                // {
                //     test: /\.css$/,
                //     use: [
                //         'css-loader'
                //     ]
                // },
                // {
                //     test: /\.scss$/,
                //     exclude: [/node_modules/],
                //     use: [
                //         'css-loader',
                //         'sass-loader'
                //     ]
                // },
                {
                    test: /\.js$/,
                    loader: 'babel-loader',
                    exclude: /node_modules/
                }//,
                // {
                //     test: /\.(png|jpg|gif|svg)$/,
                //     loader: 'file-loader',
                //     options: {
                //         name: '[name].[ext]?[hash]'
                //     },
                //     exclude: /node_modules/
                // },
                // {
                //     test: /\.(png|woff|woff2|eot|ttf|svg)$/,
                //     loader: 'url-loader',
                //     exclude: /node_modules/
                // }
            ]
        },
        plugins : [
            new webpack.ProvidePlugin({
                $: 'jquery',
                jQuery: 'jquery'
            })
        ]
    }
}
