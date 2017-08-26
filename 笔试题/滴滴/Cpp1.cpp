#include <iostream> 
using namespace std; 
int maxSum(int num[],int size){
	int sum = num[0]; 
	int max = num[0]; 
	for (int i = 1; i < size; i++) {
		if(sum>0){
		   sum+=num[i];
		}
		else{
		   sum=num[i];
		}
		if(max<sum){
            max=sum;
		}
	}
	return max; 
} 
int main(){ 
	int nArr[100];
    char c;
    int i=0;
    while((c=getchar())!='\n') 
    {
        if(c != ' ')  
        {
            ungetc(c,stdin);
            cin>>nArr[i++];
        }
    }
	cout<<maxSum(nArr,i);
	return 0; 
}

