#!/bin/bash
echo "Lines of php Code:"
find . -name "*.php"|xargs cat|wc -l
echo "Lines of js Code:"
find . -name "*.js"|xargs cat|wc -l
echo "Lines of css Code:"
find . -name "*.css"|xargs cat|wc -l
echo "Lines of py Code:"
find . -name "*.py"|xargs cat|wc -l
