# ------------------------------------------------------------------------------
# We have team to commit code, but when delivery code to client, we only keep
# log of single account.
#
# Copied from: https://help.github.com/articles/changing-author-info/
# ------------------------------------------------------------------------------

# Create fake repos
mkdir -p /tmp/git-rewrite
cd /tmp/git-rewrite
git init .
echo "bar" > foo
git add foo
git commit -m "foobar"

# Check the commit logs
git log --pretty=format:"%h <%an %ae> %s"

# Rewrite
git filter-branch -f --env-filter '
CORRECT_NAME="Company"
CORRECT_EMAIL="contact@example.com"

if [ "$GIT_COMMITTER_EMAIL" != "$CORRECT_EMAIL" ]
then
    export GIT_COMMITTER_NAME="$CORRECT_NAME"
    export GIT_COMMITTER_EMAIL="$CORRECT_EMAIL"
fi

if [ "$GIT_AUTHOR_EMAIL" != "$CORRECT_EMAIL" ]
then
    export GIT_AUTHOR_NAME="$CORRECT_NAME"
    export GIT_AUTHOR_EMAIL="$CORRECT_EMAIL"
fi
' --tag-name-filter cat -- --branches --tags

# Check the commit logs again
git log --pretty=format:"%h <%an %ae> %s"

# Cleanup
rm -rf /tmp/git-rewrite
