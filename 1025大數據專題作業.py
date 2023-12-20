import pandas as pd
import numpy as np
import os
os.chdir('C:\\Users\\lsjh1\\OneDrive\\桌面\\大四上\\2教育大數據分析專題製作\\李文廷\\1025上課')

df = pd.read_csv('2的資料\\edu_bigdata_imp1.csv', encoding='big5', low_memory=False)

#1-1
df_filtered = df[df['PseudoID'] == 39]
unique_values = df_filtered['dp001_review_sn'].unique()

print('1-1:', len(unique_values))

#1-2
df_filtered = df[df['PseudoID'] == 39]
df_filtered = df_filtered.dropna(subset=['dp001_question_sn'])
unique_values = df_filtered['dp001_question_sn'].unique()

print('\n1-2:', len(unique_values))

#2-1
df_filtered = df[df['PseudoID'] == 281]
df1 = df_filtered.dropna(subset=['dp001_video_item_sn'])
df2 = df_filtered.dropna(subset=['dp001_indicator'])
unique_values1 = df1['dp001_video_item_sn'].unique()
unique_values2 = df1['dp001_indicator'].unique()

print('\n2-1:')
for i in range(len(unique_values1)):
    print(int(unique_values1[i]),'-->',unique_values2[i])
    
#2-2
df_filtered = df[df['PseudoID'] == 281]
df_filtered1 = df_filtered[df_filtered['dp001_prac_score_rate'] == 100]
num_rows = df_filtered1.shape[0]

print('\n2-2:', num_rows)

#3-1
df_filtered = df[df['PseudoID'] == 71]
df_filtered1 = df_filtered[df_filtered['dp001_record_plus_view_action'] == 'paused']

print('\n3-1:', len(df_filtered1))

#3-2
df_filtered = df[df['PseudoID'] == 71]
df_filtered = df_filtered.dropna(subset=['dp001_review_start_time'])
unique_values = df_filtered['dp001_review_start_time'].unique()
for i in unique_values:
    indices = np.where(unique_values == i)
    unique_values[indices] = i[:10]

print('\n3-2:', set(unique_values))

#4-1
column = df.iloc[:, 5]
value_counts = column.value_counts()
most_frequent_element = value_counts.idxmax()
most_frequent_count = value_counts.max()

print('\n4-1:', int(most_frequent_element), 'FREQ:', most_frequent_count)

#4-2
df_filtered = df[df['dp002_extensions_alignment'] == '["十二年國民基本教育類"]']

print('\n4-2:', len(df_filtered))

#4-3
column = df.iloc[:, 30]
value_counts = column.value_counts()
top_3_elements = value_counts.head(3)

print('\n4-3:', top_3_elements)

#4-4
df_filtered = df[df['dp002_extensions_alignment'] == '["校園職業安全"]']

print('\n4-4:', len(df_filtered))