# Start
# ---------------------
git config --global user.name "First Last"
git config --global user.email "username@domain.com"

# Run git from other directory
# ---------------------
git --git-dir /path/to/.git/ push --all bb

# pull and push all branches
# ---------------------
git push --all origin

# Checkout
# ---------------------
# Checkout single branch
git checkout --single-branch --branch=BranchName

# Create new branch with no history
git checkout --orphan branchName

# Checkout a remote branch
git remote update
git fetch
git checkout -b local-name origin/remote-name

# History of directory/file
# ---------------------
git log --all --graph \
  --pretty=format:'%Cred%h%Creset -%C(yellow)%d%Creset %s %Cgreen(%cr) %C(bold blue)<%an>%Creset'\n--abbrev-commit \
  --date=relative

# Release notes
git log tag1...tag2 --pretty=oneline --reverse --abbrev-commit

# Misc
# ---------------------

# Git submodule
git submodule add https://github.com/doctrine/DoctrineBundle.git bundles/DoctrineBundle

# Delete all tags
git tag | xargs git tag -d 

# Remote all deleted files from repository
git rm $(git ls-files --deleted)

# Aliases
# ---------------------
ls = log --oneline
caa = commit -a --amend -C HEAD
