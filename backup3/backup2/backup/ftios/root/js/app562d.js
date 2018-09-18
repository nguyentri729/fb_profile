var $$ = Dom7,
    isAndroid = Framework7.prototype.device.android === !1,
    app = new Framework7({
        root: "#app",
        id: "io.framework7.testapp",
        name: "Framework7",
        theme: "ios",
        data: function() {
            return {
                user: {
                    firstName: "John",
                    lastName: "Doe"
                },
                products: [{
                    id: "1",
                    title: "Apple iPhone 8",
                    description: "Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nisi tempora similique reiciendis, error nesciunt vero, blanditiis pariatur dolor, minima sed sapiente rerum, dolorem corrupti hic modi praesentium unde saepe perspiciatis."
                }, {
                    id: "2",
                    title: "Apple iPhone 8 Plus",
                    description: "Velit odit autem modi saepe ratione totam minus, aperiam, labore quia provident temporibus quasi est ut aliquid blanditiis beatae suscipit odio vel! Nostrum porro sunt sint eveniet maiores, dolorem itaque!"
                }, {
                    id: "3",
                    title: "Apple iPhone X",
                    description: "Expedita sequi perferendis quod illum pariatur aliquam, alias laboriosam! Vero blanditiis placeat, mollitia necessitatibus reprehenderit. Labore dolores amet quos, accusamus earum asperiores officiis assumenda optio architecto quia neque, quae eum."
                }]
            }
        },
        methods: {
            helloWorld: function() {
                app.dialog.alert("Hello World!")
            }
        },
        routes: routes
    }),
    homeView = app.views.create("#view-home", {
        url: "/"
    }),
    ftstoreView = app.views.create("#view-ftstore", {
        url: "/ftstore/"
    }),
    abcView = app.views.create("#view-blog", {
        url: "/blog/"
    }),
    vipView = app.views.create("#view-cydia", {
        url: "/cydia/"
    }),
    vipView = app.views.create("#view-account", {
        url: "/account-tab/"
    }),
    vipView = app.views.create("#view-search", {
        url: "/search/"
    });
$$("#my-login-screen .login-button").on("click", function() {
    var a = $$('#my-login-screen [name="username"]').val(),
        b = $$('#my-login-screen [name="password"]').val();
    app.loginScreen.close("#my-login-screen"), app.dialog.alert("Username: " + a + "<br>Password: " + b)
});