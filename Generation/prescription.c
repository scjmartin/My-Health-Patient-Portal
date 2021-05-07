#include <stdlib.h>
#include <stdio.h>

int premium();
int deductible();
int coverage();

int main()
{
  char *str = 0;
  char file_name[] = "scripData.txt";
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
    printf("'),\n");
    i++;
  }


  fclose(file);
  return 0;
}