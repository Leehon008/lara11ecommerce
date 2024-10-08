#!/bin/bash

# Define an array of remotes
remotes=("https://github.com/Leehon008/lara11ecommerce.git" "https://github.com/codewandtech/best-for-creative.git")  # Add your remote names here

# Push to each remote
for remote in "${remotes[@]}"; do
    git push "$remote" main  # Change 'main' to your branch name if needed
done