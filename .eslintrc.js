module.exports = {
    "env": {
        "browser": true,
        "es6": true,
    },
    "extends": [
        "vue",
        'plugin:vue/recommended' // or 'plugin:vue/base'
    ],
    "plugins": [
        "vue"
    ],
    globals: {
        Bus: false,
        RemoteErrors: false,
        _: false,
        Message: false,
        moduleEnabled: false,
        Alert: false
    },
    "parserOptions": {
        "sourceType": "module"
    },
    "rules": {
        "indent": [
            "error",
            2,
            { "SwitchCase": 1 }
        ],
        "quotes": [
            "error",
            "single"
        ],
        "semi": [
            "error",
            "never"
        ],
        "camelcase": [
            "error",
            { "properties": "never" }
        ],
        "vue/max-attributes-per-line": [
            "error",
            { "singleline": 2 }
        ],
        "vue/order-in-components": ["error", {
            "order": [
                "el",
                "name",
                "parent",
                "functional",
                ["delimiters", "comments"],
                ["components", "directives", "filters"],
                "extends",
                "mixins",
                "inheritAttrs",
                "model",
                ["props", "propsData"],
                "data",
                "computed",
                "watch",
                "methods",
                "LIFECYCLE_HOOKS",
                ["template", "render"],
                "renderError"
            ]
        }]
    },

};
