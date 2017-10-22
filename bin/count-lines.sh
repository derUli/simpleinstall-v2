#!/bin/bash
echo "Lines of php Code:"
find . -name "*.php" -type f|xargs cat|wc -l
echo "Lines of js Code:"
find . -name "*.js" -type f|xargs cat|wc -l
echo "Lines of css Code:"
find . -name "*.css" -type f|xargs cat|wc -l
echo "Lines of py Code:"
find . -name "*.py" -type f|xargs cat|wc -l
