#include <stdlib.h>
#include <stdio.h>

int premium();
int deductible();
int coverage();

int main()
{
  char *str = 0;
  char file_name[] = "insData.txt";
  FILE *file = fopen(file_name, "r");

  int a;
  int h;
  int i = 0;
  if(file)
  {
    fseek(file, 0, SEEK_END);
    a = ftell(file);
    fseek(file, 0, SEEK_SET);
    str = malloc(a);

    if(str)
    {
      fread(str, 1, a, file);
    }
    fclose(file);
  }


  while(str[i] != '\0')
  {
    printf("('");
    while(str[i] != '\n')
    {
      printf("%c", str[i]);
      i++;
    }
    printf("', ");  //possible error
    h = premium();
    printf("%d, ", h);
    h = deductible();
    printf("%d, ", h);
    h = coverage();
    printf("%d),\n", h);
    i++;
  }


  fclose(file);
  return 0;
}

int premium()
{
  int i = rand();
  while(1)
  {
    i = rand();
    if(i > 2500 && i < 11000)
    {
      return i;
    }
  }
}

int deductible()
{
  int i = rand();
  while(1)
  {
    i = rand();
    if(i > 2000 && i < 10000)
    {
      return i;
    }
  }
}

int coverage()
{
  int i = rand();
  while(1)
  {
    i = rand();
    if(i > 10000 && i < 1000000)
    {
      return i;
    }
  }
}