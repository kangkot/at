1. Email domains — `/config/edit/auth.email-domains/`
2. [Custom fields](https://secure.phabricator.com/book/phabricator/article/custom_fields/)

## Fixing

    /etc/mysql/my.cnf -> max_user_connections = 20
    /opt/php55/etc/php55.ini -> disable_functions: Disable
    chmod a+r /usr/local/bin/{diff,pygmentize,python}
