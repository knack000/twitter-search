module.exports = {  
    entry: 'public/js/map.js',
    output: {
        path: __dirname + '/dist',
        filename: 'public/js/map.js'
    },
    module: {
        loaders: [
            {
                test: /\.js$/,
                exclude: /node_modules/,
                loader: 'babel',
                query: {
                    presets: ['es2015']
                }
            }
        ]
    }
}