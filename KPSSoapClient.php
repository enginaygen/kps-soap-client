<?php

/**
 * KPSSOapCLient
 *
 * @copyright  Copyright (c) Engin Aygen <aygen@bilkent.edu.tr>
 * @license    http://opensource.org/licenses/gpl-license.php GNU General Public License, Version 3
 * @version    1.0
 */
class KPSSoapClient extends SoapClient
{
    /**
     * XML Templates
     */

    const STS_TEMPLATE = "PHM6RW52ZWxvcGUgeG1sbnM6cz0iaHR0cDovL3d3dy53My5vcmcvMjAwMy8wNS9zb2FwLWVudmVsb3BlIiB4bWxuczphPSJodHRwOi8vd3d3LnczLm9yZy8yMDA1LzA4L2FkZHJlc3NpbmciIHhtbG5zOnU9Imh0dHA6Ly9kb2NzLm9hc2lzLW9wZW4ub3JnL3dzcy8yMDA0LzAxL29hc2lzLTIwMDQwMS13c3Mtd3NzZWN1cml0eS11dGlsaXR5LTEuMC54c2QiPgogICAgPHM6SGVhZGVyPgogICAgICAgIDxhOkFjdGlvbiBzOm11c3RVbmRlcnN0YW5kPSIxIj5odHRwOi8vZG9jcy5vYXNpcy1vcGVuLm9yZy93cy1zeC93cy10cnVzdC8yMDA1MTIvUlNUL0lzc3VlPC9hOkFjdGlvbj4KICAgICAgICA8YTpNZXNzYWdlSUQ+PC9hOk1lc3NhZ2VJRD4KICAgICAgICA8YTpSZXBseVRvPgogICAgICAgICAgICA8YTpBZGRyZXNzPmh0dHA6Ly93d3cudzMub3JnLzIwMDUvMDgvYWRkcmVzc2luZy9hbm9ueW1vdXM8L2E6QWRkcmVzcz4KICAgICAgICA8L2E6UmVwbHlUbz4KICAgICAgICA8YTpUbyBzOm11c3RVbmRlcnN0YW5kPSIxIj48L2E6VG8+CiAgICAgICAgPG86U2VjdXJpdHkgczptdXN0VW5kZXJzdGFuZD0iMSIgeG1sbnM6bz0iaHR0cDovL2RvY3Mub2FzaXMtb3Blbi5vcmcvd3NzLzIwMDQvMDEvb2FzaXMtMjAwNDAxLXdzcy13c3NlY3VyaXR5LXNlY2V4dC0xLjAueHNkIj4KICAgICAgICAgICAgPHU6VGltZXN0YW1wIHU6SWQ9Il8xIj4KICAgICAgICAgICAgICAgIDx1OkNyZWF0ZWQ+PC91OkNyZWF0ZWQ+CiAgICAgICAgICAgICAgICA8dTpFeHBpcmVzPjwvdTpFeHBpcmVzPgogICAgICAgICAgICA8L3U6VGltZXN0YW1wPgogICAgICAgICAgICA8bzpVc2VybmFtZVRva2VuIHU6SWQ9Il8yIj4KICAgICAgICAgICAgICAgIDxvOlVzZXJuYW1lPjwvbzpVc2VybmFtZT4KICAgICAgICAgICAgICAgIDxvOlBhc3N3b3JkIFR5cGU9Imh0dHA6Ly9kb2NzLm9hc2lzLW9wZW4ub3JnL3dzcy8yMDA0LzAxL29hc2lzLTIwMDQwMS13c3MtdXNlcm5hbWUtdG9rZW4tcHJvZmlsZS0xLjAjUGFzc3dvcmRUZXh0Ij48L286UGFzc3dvcmQ+CiAgICAgICAgICAgIDwvbzpVc2VybmFtZVRva2VuPgogICAgICAgIDwvbzpTZWN1cml0eT4KICAgIDwvczpIZWFkZXI+CiAgICA8czpCb2R5PgogICAgICAgIDx0cnVzdDpSZXF1ZXN0U2VjdXJpdHlUb2tlbiB4bWxuczp0cnVzdD0iaHR0cDovL2RvY3Mub2FzaXMtb3Blbi5vcmcvd3Mtc3gvd3MtdHJ1c3QvMjAwNTEyIj4KICAgICAgICAgICAgPHdzcDpBcHBsaWVzVG8geG1sbnM6d3NwPSJodHRwOi8vc2NoZW1hcy54bWxzb2FwLm9yZy93cy8yMDA0LzA5L3BvbGljeSI+CiAgICAgICAgICAgICAgICA8YTpFbmRwb2ludFJlZmVyZW5jZT4KICAgICAgICAgICAgICAgICAgICA8YTpBZGRyZXNzPjwvYTpBZGRyZXNzPgogICAgICAgICAgICAgICAgPC9hOkVuZHBvaW50UmVmZXJlbmNlPgogICAgICAgICAgICA8L3dzcDpBcHBsaWVzVG8+CiAgICAgICAgICAgIDx0cnVzdDpSZXF1ZXN0VHlwZT5odHRwOi8vZG9jcy5vYXNpcy1vcGVuLm9yZy93cy1zeC93cy10cnVzdC8yMDA1MTIvSXNzdWU8L3RydXN0OlJlcXVlc3RUeXBlPgogICAgICAgIDwvdHJ1c3Q6UmVxdWVzdFNlY3VyaXR5VG9rZW4+CiAgICA8L3M6Qm9keT4KPC9zOkVudmVsb3BlPg==";
    const KPS_TEMPLATE = "77u/DQo8czpFbnZlbG9wZSB4bWxuczpzPSJodHRwOi8vd3d3LnczLm9yZy8yMDAzLzA1L3NvYXAtZW52ZWxvcGUiIHhtbG5zOmE9Imh0dHA6Ly93d3cudzMub3JnLzIwMDUvMDgvYWRkcmVzc2luZyIgeG1sbnM6dT0iaHR0cDovL2RvY3Mub2FzaXMtb3Blbi5vcmcvd3NzLzIwMDQvMDEvb2FzaXMtMjAwNDAxLXdzcy13c3NlY3VyaXR5LXV0aWxpdHktMS4wLnhzZCI+DQogICAgPHM6SGVhZGVyPg0KICAgICAgICA8YTpBY3Rpb24gczptdXN0VW5kZXJzdGFuZD0iMSI+PC9hOkFjdGlvbj4NCiAgICAgICAgPGE6TWVzc2FnZUlEPjwvYTpNZXNzYWdlSUQ+DQogICAgICAgIDxhOlJlcGx5VG8+DQogICAgICAgICAgICA8YTpBZGRyZXNzPmh0dHA6Ly93d3cudzMub3JnLzIwMDUvMDgvYWRkcmVzc2luZy9hbm9ueW1vdXM8L2E6QWRkcmVzcz4NCiAgICAgICAgPC9hOlJlcGx5VG8+DQogICAgICAgIDxhOlRvIHM6bXVzdFVuZGVyc3RhbmQ9IjEiPjwvYTpUbz4NCiAgICAgICAgPG86U2VjdXJpdHkgczptdXN0VW5kZXJzdGFuZD0iMSIgeG1sbnM6bz0iaHR0cDovL2RvY3Mub2FzaXMtb3Blbi5vcmcvd3NzLzIwMDQvMDEvb2FzaXMtMjAwNDAxLXdzcy13c3NlY3VyaXR5LXNlY2V4dC0xLjAueHNkIj4NCiAgICAgICAgICAgIDx1OlRpbWVzdGFtcCB1OklkPSJfMCI+DQogICAgICAgICAgICAgICAgPHU6Q3JlYXRlZD48L3U6Q3JlYXRlZD4NCiAgICAgICAgICAgICAgICA8dTpFeHBpcmVzPjwvdTpFeHBpcmVzPg0KICAgICAgICAgICAgPC91OlRpbWVzdGFtcD4NCiAgICAgICAgICAgIDx4ZW5jOkVuY3J5cHRlZERhdGEgVHlwZT0iaHR0cDovL3d3dy53My5vcmcvMjAwMS8wNC94bWxlbmMjRWxlbWVudCIgeG1sbnM6eGVuYz0iaHR0cDovL3d3dy53My5vcmcvMjAwMS8wNC94bWxlbmMjIj4NCiAgICAgICAgICAgICAgICA8eGVuYzpFbmNyeXB0aW9uTWV0aG9kIEFsZ29yaXRobT0iaHR0cDovL3d3dy53My5vcmcvMjAwMS8wNC94bWxlbmMjYWVzMjU2LWNiYyIvPg0KICAgICAgICAgICAgICAgIDxLZXlJbmZvIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwLzA5L3htbGRzaWcjIj4NCiAgICAgICAgICAgICAgICAgICAgPGU6RW5jcnlwdGVkS2V5IHhtbG5zOmU9Imh0dHA6Ly93d3cudzMub3JnLzIwMDEvMDQveG1sZW5jIyI+DQogICAgICAgICAgICAgICAgICAgICAgICA8ZTpFbmNyeXB0aW9uTWV0aG9kIEFsZ29yaXRobT0iaHR0cDovL3d3dy53My5vcmcvMjAwMS8wNC94bWxlbmMjcnNhLW9hZXAtbWdmMXAiPg0KICAgICAgICAgICAgICAgICAgICAgICAgICAgIDxEaWdlc3RNZXRob2QgQWxnb3JpdGhtPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwLzA5L3htbGRzaWcjc2hhMSIvPg0KICAgICAgICAgICAgICAgICAgICAgICAgPC9lOkVuY3J5cHRpb25NZXRob2Q+DQogICAgICAgICAgICAgICAgICAgICAgICA8S2V5SW5mbz4NCiAgICAgICAgICAgICAgICAgICAgICAgICAgICA8bzpTZWN1cml0eVRva2VuUmVmZXJlbmNlPg0KICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICA8WDUwOURhdGE+DQogICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICA8WDUwOUlzc3VlclNlcmlhbD4NCiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICA8WDUwOUlzc3Vlck5hbWU+PC9YNTA5SXNzdWVyTmFtZT4NCiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICA8WDUwOVNlcmlhbE51bWJlcj48L1g1MDlTZXJpYWxOdW1iZXI+DQogICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICA8L1g1MDlJc3N1ZXJTZXJpYWw+DQogICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIDwvWDUwOURhdGE+DQogICAgICAgICAgICAgICAgICAgICAgICAgICAgPC9vOlNlY3VyaXR5VG9rZW5SZWZlcmVuY2U+DQogICAgICAgICAgICAgICAgICAgICAgICA8L0tleUluZm8+DQogICAgICAgICAgICAgICAgICAgICAgICA8ZTpDaXBoZXJEYXRhPg0KICAgICAgICAgICAgICAgICAgICAgICAgICAgIDxlOkNpcGhlclZhbHVlPjwvZTpDaXBoZXJWYWx1ZT4NCiAgICAgICAgICAgICAgICAgICAgICAgIDwvZTpDaXBoZXJEYXRhPg0KICAgICAgICAgICAgICAgICAgICA8L2U6RW5jcnlwdGVkS2V5Pg0KICAgICAgICAgICAgICAgIDwvS2V5SW5mbz4NCiAgICAgICAgICAgICAgICA8eGVuYzpDaXBoZXJEYXRhPg0KICAgICAgICAgICAgICAgICAgICA8eGVuYzpDaXBoZXJWYWx1ZT5TcWlEWXF6N25LM2RaSTZ1TkU5UUt1eVdLVVVENFlBWFpNeVRKaHdmN2I4WEQxOGtiK2I3STBGYW11RU83cVJxYkJ1ZEpORHZDUzdCWG5QeFZ5NXE0ZnJSY0FhY3ZIeEk4TDh3UjE2d3BvY2tBZUxSd01TQTVYeE41aWQwSnFYdll5QWNWejNqbVpHeENMYUd3U0JKTXkvaDg2Ly90TkFETXJSR3dQZ3hMZmYxVWxXUWw1TG9Ka3VPRVJDZ0ZWelJ4TE43c1ByNDdjUm03Qkc5dDJtaGhBNWZiMkIycUFpR0taS1RGQWFNaEZZTlFKaG1waU4xTEw5NHZWZEQyTjNwSHVGaExzcTh4aUNoRStuUHNTa1Z4S2dES3VwMDYrdkpRa2hYQnRFTVdIU2FJdWgrclltVE9IOWZTenV0Nkp4bTk2WkRIRk9pbmFlMi9CMGtlRVVhSHpVWWJGY3hvdEJFZ1pDZkllQjRSbU1xZGMyVkcrR3h0VFN5VGtPMFZXUXlMRXluNUJkVFhHQmNWVmk2YytZL1RDclkrZlcyT0dhdkJ3MHVzSzdxb2ozMkFuRGhwVWY3NEdCNExRWFhIRlRvT1NRY0hIZURjMitLSEJiNmFlTURtV3cwTU5uaFRNRndna2pDWW1vUWpjVFg2ZXpmSUdjTzdRRFZKd3JzUkY0UzRIb1U0TnA3N3dHdW9JQ3MyMGVCRzdCSG1hakx3a2VIRkdwU3FxZ2pxNjc0RHNWQVB4VStwcHk3clFoa0Q2amFaemVoOEZncW5QNVNZWFdQVngyMTFoejRwcm91OHJtTFpPK21TQ1NJTzBUV0hXRUkzZ05kVVBGU0hFZlRVcHU5WmRSUDFnZERRREJSdldFMDlSWkZqL3RhY0E0MVpyQ0R0YUpTbXFCVFdLSmVKNXpub1QrZ0RRNlk3dUFtVjJac3hObmQ2RnNtTTlHKzdmTjVoUmpkQXBPMDMyR2dWQ2tQUkNsRkVmd3Rqd3BGR3UvMTRYUmNKU3R6RDdxbVpYcEQwQmRFa05SWnk3MFpkNGlnUW5iSC9jUVltaVNyRDJKWUczaWhtUEFGR2poaXFaRU9CanF3blBTRDdPVjhIMzRscTlvUk5DV1Q0bTJFL01YUVAxY3Q3OHB6U08vOWc5ZVdGS09SRGlRQ0Q0bzNYN3pidndCRUwydkgxTGRvbDJ6OGxoSVRMT0JNWkx3TUhTaEhDZU5BWDlVK3Q0bXRCbnN5ZGpTcGZoVU4vSUV0NWFFUlFTYkwrb1EzS1BhZ1Y1Z0pDajNnaXhUM24wTGFaaDZWK2picGhoQXVtTUhrbjA2YUZtMmhKKzZWM2VXK0R6RW15bGNrRzlTWUpvZ0N2dHRBbjU5N2x0YWNpdko3MkYzUlM3V0UzOFJPOHlpUm9La3Zvb2FCWVJWYXNSLytQSGtnQ2JoSmwzWm8xUVplNE05M1hlNzl0V1lLTWIwWjY5dld0cDZwN3hpWWwxWVU0MjhzQmdPVGhaUlFFNHhmWXNMaU9PMnhsMVVGMDVVODRnSnN4dUNsdGxwS1lOVVV6ZHZyY29HYm1SZy8xRmpqZUNFMVVBSWNWYndvMmtxb05UU1dEREpUd1ZNQVZuaXNYNkI3K1dmeFpTcyttcHBlVGJhc3ZaVUNMWUE0NGl6L0pvMUdrc0dPeGpZMnM1U05pSS8yRytCVDFnb0FaMHZ6WlNkT01qWG9NQmRRRkVSZUkzUDlaRmszOUlmcGZXUmhvMUxDaDIrNm1uZFJZRTRjZkd5OFJMd2h4MWU1Y3AxbmMyb3hMOHNLZVF0eDd5cituSDJiT0N1NERLSk5Gb0dIVE5IMUxVcCtPTnhNM2xTeEZaOUFMTU0xb2VxNThvUWU3MkZaRnZFS3Jyd0I0cE1wdU1RUDg4bWpoZi8zOG9IZHh3OWs0UjVzc0FIMGFoZ1NYL1Fvck53LzB3ZVNMZGN3TlF6WFV6N1RuNE85bVY1Vm4wTDBPNmJvc1FlR0VpbVh0Y0VNRkVZUXVPWlVHOHRFRy9zeE5vNG1GYThLZmFyOFk2SUgxYTRQYnc4cUJaa3d2RllxN05ZYVQyQWpwSE12L3E2RHFmTTJleWFScU95SDJEYVpWSkJ2K0xIYWtnTzVsU1ZlOERZZlNrNWFCMjBLdTAyaGprcGVmaVZwZXpFV25TeW5ibG9sOHIxNFFPWVdsd0NsWWpEbGJFY3VEK3ZBT3I2cFNtbEY3NWRHa0c4TVdmdlAyTCtkK3l0U3NyckgxZFFUMHpBTXJRdTI0R0NYQ3pTNmM0SWtvUzVWUGhLbC9xUmJsaTlCVmpXR0htWXkwdUYxTjZDZko5WE1ZY2tuWWVvQTJTLzJCN2tvZmhIUmZCWUJMU3NTKzlZZDBjb2FwUmgzbVVIWmNMN2oyTE9EY2lUT1k2QnQ0aXMwM0thTnA0YzQraDRQaHZnUVZSNlcvNk1rYmVjc1hZZXZmaW1rOVdqd0F3cE9BREx2cVlEb1o3Njc0c0p1Z29OR3EwNHVpTjlvR2JFVnYxaW5xem1meEtWb3NIS092NkxkNXZGUEpDajluZHhQS21LMnV1M0dzeGtpQlNMUEJ3YnlGMjlIc2FMZUlPcjZnOU9vYys0VEtBQksyeDJTRk5wNGt6bUJ6anZyS0c2ZzNrTm9lQ0VEd211Yk4yUzRhbWpOc2ErdmRMRUpoTTJ0SUFtZ0ppMG5zM0dXMWNjWXQzTkJZY2VKMmE4dWY0cTBVdjBuMU1xVGtwTng1MHQ0SHdLTklWaFMyaWVzaWNaSVpOTUNvSGdSUUxWUEtsZThlUnpDM3JUMDlUbzFpSHpCdVk4ckxYSm9MbS9qSEZmUUN2Rm1rK3dsZ1pzOG94K25FTlpJaFVtVEhKV2srbEU3ci9KT3gzOEVOaWlJcTFOQXoybU1Ma3hTWm5rV3A0U1VuYktWSUoySEY0UFNsamg0Qm1RK0o4OTM2UmVaUWNzNXFJcjR0b0xLK1ZjVi9ZbUhKcDZuV3FZZHQ0VnVwaGV2RkEvcksvR1J4TFdUNU9lRVpPb2JGT3VMMkQ4TVIvWlA2T0M3ZHB3UThvejUydXJaNWVDVTdoSktaQUlwWHo2UGp2Wkd5TEhDNXJ1ZXkrS2l6Z0VmZkpXOHFhR2cvK3o5RVZQRzJxenpsbDVQYnM0TlY5aEV4dlRGaWY3SjZQY2h4eXhOazM3TjhYcFBEMjR1UnBQc0RDMmpuYU1GK1k5SlN3cVZHT0hWbm5oUS9ZUEJkNFFpYm96UlE4NWZLbTN4N254Z3V4MkxTMUNXa1VXc011bW5tQm9raXNpT3hiY09oVVNLS2h5aEorRVB6L0NwazlkWWlONjA2WVdkbmltdGlCYUNsSW9XNHNtNE16RmREdUFzd3h1Nkh0Rk5GSitjUi9ZcHkraTdndVMvTXJtVE1sOTQzcC9qSGhvQVowditlNkFYMjQ3RlptbGlRSlpaYlFUZnlsVlc0NnBncHVXQ1NkRU5LcjRZUDIyOEhLQjlJbTc4ZzdrUFVTdDMyNjBNUVNSanhlQWRjVDdOZlZEQkRKVHpablpFT25GSmFhNFpoa0V2YkdqVUszdGFFMUJHMTQwMEYvSFJ0ZmFMM2c2cC8yNEpBa095T3lnZm5TbUhiVHQycGY1bUtnaXlwVzViZVh1U1BaN0xsVVA5d1VEcGp2b3V6VVpRMzQvRDRKRHBsZnlveVBmb1VTZHhBQjlYdFJPdUN2aW9IYm9HM0lKOEtVZHk0MUtUOXk5WkdJbEtqaTFiSGVEd1NQTXdrWWVocGdKMUVpb3duN29qUXJlSzR4bTEzVncwUmR2M3kxeXBoakl1RndoRDUwWXlkTjJjMGp1Q3NBSm1OTmg4K1FMaEdEUEhyQUNMRWxsQWw2aWdWNkw1NjlQbmdUQkQyazZFRWpRT3RmTkZibjJ6NFFMUllVWTNKWWh1ZEowdXU3cXZQT1hlejc2Nnh4ODRLQmdHVDc5bTVuUnNKRmRGVW8vQlFpVER4Z3grWkJKZHZ1T2ZGekptdTViMVNzYUZNRWpjQ05KTmsrV0V1aGR5N2pQSzRaT1BFUFR0SWgyQWJzbVpxNHdlTURDcHFmUU1CNGNwQTZWTzREYkNuU0c1SUFWSWptZytxVWdWYktUTkJvZ1ovZ0NoUmZBTDFZaVJlVHJmMzA1Zm52RTFnVUJFL0FiK2ZrdlZGRkZDWXhDakhwSnlHVnU2Tk10NU5sNkYyajFpU1JRcXN4SUpxODNxb3pqT1c5eHNTN0lJc1FwZUsrYXFiTVVFcUFSa1JJTGFWdHIxMVp1TS9rMXBNQWIxdW50bEx5NDUzNmN2THJRUkVjSHhSbDZ5dWtDTDlqL2poWTFqYk1rTHJXRE1jTHdEVy9yT1VURW11MUoyQTY2bVAvOTA0VG9kS09GWkZQTlhMM2hFZHBzcGtKOW9lTGova3VBRmxBUlAxcy8wNzhFUG9GRjl2SVRqaHJxN1grSHQ2NnZwREw5dXU4ZUhzMFhuRkh2QWd3MGcyVmJxSHk1blJ0eEJQUXhWbSt2c04vNG42ZTZlVGtKSkt4aGU0eUd5QXlXRk9vQXJ0cGttSzQ4a1Q1cFFKWWlWZFRRa3ZSUXJ0SDFBamRpVTQwTFBsL2F3clppL3lDcy9uZldJU3prMGFLaXlwcXY0T0JoSFhyUnV1K0NCZVJZUDZOK2s3VGdRcjNKa0JCZ0JrQmRIcGhJaC9JQURDQ080K2xkTEs3b3ZSYlYzbVBrcDNDU1NqU1J4Sm5NWnVGRk5YeVVkamlmMWhCNHlXNG1ZWnpuV1czczFVRzFqbkpGblU5NUp2cUI0ZGEzYTRIV21TaWZ0RlhOTjRjVHNjbzRzMDN6VDVqR2dLN09QbzAveHZlSTB0RC9mdFpScHJwc2F2VlpjSlVEMzhwT09YQVpFQ0ptM0dEQWw2bDdKai9FTXloWUdEcnBkcjdtRlV1TnhxWFp3a0Y0TkR2cWJtdXVMVS9TRTJtcjdhZ0lPT3NVbmVVMjNneE1ZSjRPbEQvYWl4OUl0eGF2NHlYMVdlN0ovT3dhcVdvUVMzaGFGd1gybWVHS0pQeXhXdUJ3R0dncWVnWHhzMElBRVZBRmdVeDJLbUVHaVN4NkI3MUlHeTdGajFrUzdvdHZocGtOa1lvWGxCOWNFY2cxSHUyT216dnlVWWgvSGFZK1FHOGpvNGhyaG9PR29ENXZPRkhtWXNVSzR3QlVKMEk5TStZWGZvQkIvczg5b2wwV1dUMnRpKzFISkZJbVVlTG5BMm5yOGkwMGhqZGFldXduUDQzdEo4c0sxVktvOUllY3NDdktudFJCRFBmSThlbVg4L1JINGV0L2NFdXBIYkwwbENLbTV2eVo2YXpOOUp5dmk4NFhtSmNEOGZkQ0VnN3N1NU9LekFZUFk5c3RUQURpbUNaYmlsMU5MSnVRd1lmZzlpV3V0Q2lYYlBJVzRyQ3l1V2VqUmhWSHNnMlhUZE0wRjk3VHdGcUY4MEYzWitweENSbDQxQm9aLy9rRFlaNzJUa0VTWXBtdFdtbVNHUlR3ZmYxYVErWWw5dkQrQ2R2bVIrMDJpZWFQQTVFNmpuZTV0QTVoeEhPWW5WblhxK1M1dVEvTkJCRE5xZmFSdk5pOHN2R2ZDVjlpS1ZUZUI4bjYyaEk5eWUwZVYyRWl1bVVRVUUrZlZsd0VkQVlHZ0JtalFJeWVMNGtMdmxpOWtkSEF0RmNQdUpMWWxMb1JiOGtzbTMwYWZyc0JSMGJaVWNkdmU2c0xWY3Y0UWNGQmRmNkY1enRxUUNkR0dyTVFWR1FGNlB5djZReXJYallDMEpLVzBoN0ZEL3NnZzd5WlFDVlROaEVTVGYxUzJXTW0xNTFQOEdXNGNka1pqZ3NEWEFTMlc1d09TbW1LVno3NmMxL0lMZ29haS9xRnQzd2dSM0lndTBkSEJlN1VmaTRqR0tBaTdSUHRUTkZXY3dwRHlqUUJOVERTZ3E2REtJclJ2OXhCT1FxZXY2Z2NueTFoV3drc09XbFhjRENLV2xDKzZybXdDclRSNDRNVGh1dzgyMWNUWUxxQm12RjM4aG56WE9oR3lvclJocDJUKzJNelBCS09wS1cxUUNINE9rdlhETTFQZDk1RDZQeTFOVmJUbENwaXJ6eXE0M3MrdTFPbXhoOFY1TXR3T2FxMXNlVlIwQXphSnJXY0ZDemN4bzBqMkV6emF2dmV4OUxrc0U0WWNmZEFCVHBLUUR3NlR0MnNSdEFkTnRXYnkrK0VFU0V2RjNDWk1EZTVRK2o3V1QwVlUvbC8wd1BmQmozT1hmRmRlVHRtU3Y5RzB5R2JDQ0J1bGg0c3J2SkxLcmZKMTZmSzBQRkJEUHcyY0MyMUFtR1E3TlQyeTcvZ0p3ZTdZN0hKLzRLd2wyd3k3STlJYWM1aDVPRHZOb0tURFpBUjQwQXhFRFk2ZFgzZ3ljZ3hCZTM3NGZNeGZrbkxEbllzWlA5V21CbytlZkp3SGo4d2ZTQlhnc1VCQW5GVjhPK1AzRUhXRmJ4UnFqam5sc1p4cm9jVGg1UlNUSlo3MVo5OFI0MnZLWS9OWHlzckp5OGdmVkcveERXMll5U2pYQlJpNC9rb0ZUYjdVbVIwcFpEYmloYUpoejhwbklyVUFOR3dla1ZUMjFuNTVDc1lrOUU0YnZ4Z3hheHZNQVhmQzZncUIyTyt3T1RrUzM5Y3RSTDFnU2JBVk1vd0dCdzBuaEFna1FrREkxd2hpSGJXZVlpazNGSUplMHJscFdXYllhMkVFVHJzc2xaWCtIaUg5b2JlYWgrY3MydHNHOVlXd1hFWVJZVjcyWnArWFdyVkNYMEE4RGk5Q3ZEcmU2WXRidVJtWE1tNzBtTkJQVzBkczVNNUxnWUJ2Z0NtbTVOY2swZ0ZJTVNvc2ZKOE5raWZYTEc3U1hpdU5mRStESW5iMGdINEhZbURLY0dVZk9LTGJncG95dXpEcEo5QzJ6RHk2elVpbU10SjZ5MExFY293SDBoZktMeFpKR0IxcTdraFZsT001YXd4VlVmVlJDazlEZXIzVFpveENnclljaDBpckdzOGloc01iRVZ6YUJqdlR4U1V4WXlGckMvY2wzWUNlUFd4bGhHeFIwV1hxMzM3RmJjQnlIMnF6RWhPWndKek1PczFFZzJYUGIvRnVBV1FyZTM3eWc1UndZZXBOQkJYTFNjdnQ2YVdBUlIxdHVWZWpaWERQK1k5K2txQTAraWNSNTBOK3lvNXZQbjR2T0JsV1FBcC9lalRuZGZISVhoeklkTHd4c1dxWWhBS2xzamlQT1hqbDg4bDlSRTJvMys0ZG9PRS9ob3hlU0dZMlZ5bHBib0hnYm03Mjh6cjBwOUFXUXArZjJwYkN4dGhYQ2hpbkYzM3Mwb1Zjd25kRU5IYktKcnR5K3VTc1BSQXdwNnR0empyYjYyQUhrY1dKZGhMRjFKemlwcCtQVlZzUnFuYzA2T2dSU0pidkM1NkVQWWY0aDBCZUdrUm9YamV0Qm90NnU0eWJNci9hUitObnl5TU1manRpTXRCbzZjRmgwZDlhZzhnR0hQSm50UDk5bGZvK3FBNFFNU2FZRGxEK3NkK3dKeTY5OXBrR01ibjJ1WTFtWFhpUGxRNjhWMW5FY2RJN3kvUmRna3NSZXN4SytwRnhxTmoza1l4YkovUElhbXp3bEZUdXR6TkJkcS90eGNQUndkNEphdEFTZC9wVUFEeEFpZmc2bnJLcjdlNVBwTThSbVZBUjRVbitycFRtY0czNUdQN2RKcUIyeGpqQUJCSlNUQzFwdzBnWGtXaUtsWEwyb0FldHdnNm0rVjlrUURSd0REbDE4VHk3Y0UvYmFWbHNSWC9SNk81c2lEVFdaMVhoaU9WeU9EemJEaEk5K3JoN29sMDJsbjJycUlpOVJ4RmY4WTRLdmFuTzNwUHNidU50dTg0QlZPN2xMTUp6WG1pZmVocTlIU1dWaWpBVjhkTEozMjJlSjNBbCtJaGR4MHdJZjRWNDlkeFU1SndreTBwVVJZelV6cEJwa2dJNGZpdlJMZXBjaE4rUzJsWTc2bTZJb3FnRVJjemVVYlJPd3NBRkRLMWM4RVJCNDBMS2JKdkVLZXV4ODBaM3ZvcWYwN2J1OTVlTkZrcHNEd3JvNkZDVTZhYUM5aFlOSUpEQy84WDZSUWIzeC9SODlrM2s0UndlWDhLTFRQdVZwZjBtN0FJTE5KSVhXOTcyMERCM1lrQjZJeGFHanBHZ3VsZDVoZGNnSFRmSndFMGdQUU5SWGFLeEFhdnhYazE4QldYNkhoc2FnQ0c3aklEZnBKczdGcUZGaWpiOEhabEJVL0hhL3F4ZHZZWWdyWG8zQmk0dmlOeklabEtvclN3WEswRERrczNrVnE2R29KS3ZVUmhYSTVOcFJaeXFqbFdSek9KaVd4YXpaWS9Jd1NZZ1RjMzMwelRCbUd2d1ZSbjdJQnVuSklkWmo4ZjhCOUEvRDBISGN1bFBMOEhIb09tYU5Jc1pXbmE5SXN4UzYwY00xSmZQK3VBd3poVEhhUHY4SGJBMEExc0owSjJEVTdLcE10M3hlWGNIbWh0M0kwWkU2blI1STVBMTRPMFZvaDlwZlQ3VUtObnNtdGI5WGpwZnhlbS9meGxScTVVZXpxeUJmcXVyQzZRM1dCdU1pUVpBdGVSUjJxUTByYjBjZ2NjRmFuVmJDU1R4UHBtZTU4QW53dHRLUHZpYlpHMitMb3VETGwwTjF1cWNwWlpHNXllS2NpSmxKK3RxTkpkT0JCZ1QzL1Jrcmo0bUpmOTYyckdINHNtazI5S1MxbXc1MExCUnlZRjZkTjVsSm9jcERoSGxob0I1cFBycjdnQ3FsRmlRWXhmUFlXTERrVVo3ZlFIRFA5QzMrai9DWTlUeDZFMTVlOEpIb29QdWd5bGtpU2pGaVNqV0Vsd0Uya3dHYjhmMXBqd1FxZU40eklCQlRMV0N6ODJUODhhYzJsdlRDcUxEcVh5N1dXK0Rsdk5rU3pFeTNwcjdZbXBiZEVJc0V3WVZWWXpUOUFjeXR5R015OXViRXhNK3BnRnNRUWE2WWJydHJmNXZJSWd1S3dBN1JXWnczSjB1UW16MllobmUvYzRFRWl2R3JhdUxTWitJeStaNkZZbW9Vb0Y3cEZLazltR2htakN5UHlVeVNMTzhHSWNDS2FUL0xLMEZxamRyaG5WY1lDamNLNFlFYzZ6Uy81bzV1MFdNQWpXcmZ6eE1MUkVVc1JMbSt0bEgwSVpCcTNtWUNvZjdLeVNPNjFSYzhRZEZVbmVBNnRndkdEUFJ6VUtsSHdqWUkwZTNxbDRtNjhRd0JMS2xRdmI5OEw4R3dxMm5HaFJzRWI2Y05EYnlkSU5mYlNLOTNIOU9USnY0UnRSbWZLdlRPbjlqS09sQmRlZHdQSDlvdHRKOUtrMHh3NG95eXpqUVludmhQSi9IN0hOd3BVSnhOa0ZFTXZPWGxYS05tNGh1VElLenNyL1ErODdFaWhPNkNZbW5zSHhkbHNYeTRQVjI3aUgxSU9IcXBQNFFCN0N6aVV3bDdLVXlyVzZFa0pMSGpBSmR3WWN3WVhibVpVMEJEQytlVU8xMWREWlpKdktQTHlYOG1nNnNzaDIyVEFBQ2RuK3ROSGF4NThOL1ZGL0R2YUZsZE5DL3pEeXVFa0FhSEx6WWZZZE5xTkthOTh2bHV1S2lJakdNNVgwaDRvdDBDZElsUTNFMkQra1FnWGdyV2xPZ2xtdGtUNWtVems2bkRoa0Jya3dBSFVEcVVlVGM3MEdRSCtqUlB4eVQzOW83SFBVeVA0OWtOQnBDVlFCaEZTaEZ2NjlsY3N1VHRndVVJeHlvUjlyRzQ5aTBzdXd2NDBjTWlXMDh5NWFyNlYvSk9VRzRpdSs5S0tSSzNPSmFDR0dCekRncjZQNUp6T05abEsyOWovdFJFMmo2ZmZXcXE3aUxWVWJyeXplVTVCVmY5eE4rZkpEclFJVGRibEo5cW9ZZHMwNEtmYTBhekRFb09Nek9XV2VwejViKzZWdERHTkpJbDByRVlaVkVaYjhGQllsQWI2NWgvNkJQSGxEZ1dXMk9kb1JOY1VnRnVySHFTQklJejgrUldia0lzQis0UmJpYUJaU1JVc2NWVXpoamtrNGhBZFlPdWRIMHA4TWdmaFlXdWFLWFJFbUo5aFFVaVpJQzBpNGMwQ2VqWGIwd0E1R2hsbjBBT1FmU0hmL2puTWl4WTAxQzJFdmNNc3J5bTlHNmxMOVZNNkNyd2pvQUp0emw1ek1WRklIWENVSEI4eDh0SVdtQWdiVi8vemlVYnZTTmdIZ3hyMUJJMDAwa29tUUU3T1h3OHZxZGZRaUFxbzFwNTZSaVZoTDYxbW54d2tuRFhYYndTVDMzUHpMVXE5Nit0ZXErc1ZzWmorWms3QzRzZFhCd3V5RzA0SmNvRWhMZXBYaERQZkk3WUo3K1I4UjRzeXVRNkZjVHp6TG0vTlBEdlZqT1NBMzhXQTZETC91V0tkMlJrdUdDUUhxTUZYc2x4aGtIZmpYWWkvaDl5YU9pdmkxeVpFMCsvM2MzcEVSbENtYlRRRE9WVjdmTVhaQ1huYzhudlBkUERlaTV4RnNPWDRJRkZXRmRZLzJCUnhodTZkOGpRNnI1ZFFKRStPOUxHdWNEZEJ3S1ZnMVBVcjlIVngwMktIaWZkSHZja1Z3Y3FxS2JTTy80ZytzSi84TXVZNW9acWpMTFdjMDVsZmRlOU1SU0N2eTJZNCtPUWVRYzZnWFBPTWxTZnMyQncrRi9ublBOMk1GOVMraU9lOGRJVWJDd1JjS1lXUmgxRlY5R2x4MHpxOUVuVlpHMTlTZ2VtYzcrUUpGQmdTSEtsYzFob3YwTnZ1V1FnYlh1QzMxa3Z1anlWaEhhL0xLbzhOblJIQ000R1VuUndncFgyRzNENlhxYXhvRFN3UFhKNlZ1MWFpam5IUGdNcy9WSnl5ZzN2OVRzQnZaNDVRaGtORkF3ekljdk4xQk80aHBFUVVsSWZzcm5VZFFMRW4va0ExQVBZbm1BMjRpbFJVejdkYUJudFRqK1l0U1pxeEdiWGhhNkZ1Y0x3S0V1L1dEN3g0enVkTENvTk95T0V5Y0ZUQzRaSFZudHN6UUE4MkpsVEQ3ZWRRSkYvdlBBclZYeWttdWlybXRYZHJHWlQ4K3grbzNRTmd3MVpFYkZVVXVhUU5WYTdSV2hUOVoyOTlMWmlaTys5VGpJM0ZYTVZlWmJYWGtSeFg3OVFZdGo1b09sdngwSmN1eWtWdkIrNFlrbEJHakJ6Q2VkeXRhYzhuQTY2VDNUM1hhVzZnN1lvSm55SkNMUEQwbEVDMVRRdHdXRjBpb0laanh5RFhpNWFqSU1EWk1PRUpzMVNmVkdwd1ZMSWtwVFBFblBLeHZzb1lXeDFuMTQzQXVDRjZ2QzBNSmYzU25BSm1lcGRDV0NxbTNTdENaUU9mMVc0MzYyMmYyaHBPRWVOeWZCY01aVjh5UXNRZkhISTY4Y00wdTZpRGdSWGY3Wm80a2dnSm1rSFp0SWtqS1Nqdk4zd3BRZ3RDZXBqTFBYM1l4WlVXTSs1ZU5VTWFSTitOK0F4Ukd2OUk3eFRxb2V2T3k1ZWY5TVRtOW5TQTlrN0poZmlBNS9EVk9NNDNpL293aWtFTVlqSm9TRGVkbHRzajA0blNHUGlMU0dCK0hWajZKb3pjY1BvbXk3UERUMVgzcW5GdGtMZjFCdzNxVk1XMlVZbmVmcDdIMThkazVKTmc3a2s3cWt6eGlJakszQm5zVzVXRGovZHJTUjQ1ZXRrQ3VNZVlmMHNsSDhqdWQ4dHljdEpYMzBUNGdWSEJLNGMwSktXOVB1cmVQWE90M2VKYWlBTUl0blhnSUdjekxNZUpTZWJhWlhHekVTU09QZnJvWFRzMWpRMlhpa3NyZXVLdXZGcnVkMUU4dWtwT2Q0ckxLbHJENStlNkNxQVM2NFpoYlUxcGplN3JzTkVNOEF6dnZrYXhFeWxHdzQ2R1NRbXg4WWZzb2FqQi9uaEdYUmdFdnUzWk1BRU5KMjM3bWJKeVBZUy8yMy9iVEQrYnk1d1BwUlVqT0ZqcStrc00zZEFUdWtDZUdiYWEyQWxEMUdTYUhrV0dBWCs1b1phdm9IeE1zSVRPYVFNQm5JNDRLRDNFNkVETnBVYlJOTW1Bb1Z6V211WXBkM2g0NDNReXZMYzB5QjJlSTB1Nkl1aE9lU2szZGc1QWc9PC94ZW5jOkNpcGhlclZhbHVlPg0KICAgICAgICAgICAgICAgIDwveGVuYzpDaXBoZXJEYXRhPg0KICAgICAgICAgICAgPC94ZW5jOkVuY3J5cHRlZERhdGE+DQogICAgICAgICAgICA8U2lnbmF0dXJlIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwLzA5L3htbGRzaWcjIj4NCiAgICAgICAgICAgICAgICA8U2lnbmVkSW5mbz4NCiAgICAgICAgICAgICAgICAgICAgPENhbm9uaWNhbGl6YXRpb25NZXRob2QgQWxnb3JpdGhtPSJodHRwOi8vd3d3LnczLm9yZy8yMDAxLzEwL3htbC1leGMtYzE0biMiLz4NCiAgICAgICAgICAgICAgICAgICAgPFNpZ25hdHVyZU1ldGhvZCBBbGdvcml0aG09Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvMDkveG1sZHNpZyNobWFjLXNoYTEiLz4NCiAgICAgICAgICAgICAgICAgICAgPFJlZmVyZW5jZSBVUkk9IiNfMCI+DQogICAgICAgICAgICAgICAgICAgICAgICA8VHJhbnNmb3Jtcz4NCiAgICAgICAgICAgICAgICAgICAgICAgICAgICA8VHJhbnNmb3JtIEFsZ29yaXRobT0iaHR0cDovL3d3dy53My5vcmcvMjAwMS8xMC94bWwtZXhjLWMxNG4jIi8+DQogICAgICAgICAgICAgICAgICAgICAgICA8L1RyYW5zZm9ybXM+DQogICAgICAgICAgICAgICAgICAgICAgICA8RGlnZXN0TWV0aG9kIEFsZ29yaXRobT0iaHR0cDovL3d3dy53My5vcmcvMjAwMC8wOS94bWxkc2lnI3NoYTEiLz4NCiAgICAgICAgICAgICAgICAgICAgICAgIDxEaWdlc3RWYWx1ZT5YRDJRL1VJYXZRNFpMT3NpSEtkYmE0WUcwT1E9PC9EaWdlc3RWYWx1ZT4NCiAgICAgICAgICAgICAgICAgICAgPC9SZWZlcmVuY2U+DQogICAgICAgICAgICAgICAgPC9TaWduZWRJbmZvPg0KICAgICAgICAgICAgICAgIDxTaWduYXR1cmVWYWx1ZT5sNFRwRlhod3dLQmdGQWpCMTFOZko5bkF3WFU9PC9TaWduYXR1cmVWYWx1ZT4NCiAgICAgICAgICAgICAgICA8S2V5SW5mbz4NCiAgICAgICAgICAgICAgICAgICAgPG86U2VjdXJpdHlUb2tlblJlZmVyZW5jZSBrOlRva2VuVHlwZT0iaHR0cDovL2RvY3Mub2FzaXMtb3Blbi5vcmcvd3NzL29hc2lzLXdzcy1zYW1sLXRva2VuLXByb2ZpbGUtMS4xI1NBTUxWMS4xIiB4bWxuczprPSJodHRwOi8vZG9jcy5vYXNpcy1vcGVuLm9yZy93c3Mvb2FzaXMtd3NzLXdzc2VjdXJpdHktc2VjZXh0LTEuMS54c2QiPg0KICAgICAgICAgICAgICAgICAgICAgICAgPG86S2V5SWRlbnRpZmllciBWYWx1ZVR5cGU9Imh0dHA6Ly9kb2NzLm9hc2lzLW9wZW4ub3JnL3dzcy9vYXNpcy13c3Mtc2FtbC10b2tlbi1wcm9maWxlLTEuMCNTQU1MQXNzZXJ0aW9uSUQiPl9jN2ZjNzhlZi0wMzA1LTQ5Y2YtYjY4MC0yNGQ1MjBhMTFkODE8L286S2V5SWRlbnRpZmllcj4NCiAgICAgICAgICAgICAgICAgICAgPC9vOlNlY3VyaXR5VG9rZW5SZWZlcmVuY2U+DQogICAgICAgICAgICAgICAgPC9LZXlJbmZvPg0KICAgICAgICAgICAgPC9TaWduYXR1cmU+DQogICAgICAgIDwvbzpTZWN1cml0eT4NCiAgICA8L3M6SGVhZGVyPg0KPC9zOkVudmVsb3BlPg==";

    /**
     * Namespaces
     */
    const S11 = "http://schemas.xmlsoap.org/soap/envelope/";
    const S12 = "http://www.w3.org/2003/05/soap-envelope";
    const WSU = "http://docs.oasis-open.org/wss/2004/01/oasis-200401-wss-wssecurity-utility-1.0.xsd";
    const WSSE = "http://docs.oasis-open.org/wss/2004/01/oasis-200401-wss-wssecurity-secext-1.0.xsd";
    const WSSE11 = "http://docs.oasis-open.org/wss/oasis-wss-wsecurity-secext-1.1.xsd";
    const WST = "http://docs.oasis-open.org/ws-sx/ws-trust/200512";
    const DS = "http://www.w3.org/2000/09/xmldsig#";
    const XENC = "http://www.w3.org/2001/04/xmlenc#";
    const WSP = "http://schemas.xmlsoap.org/ws/2004/09/policy";
    const WSA = "http://www.w3.org/2005/08/addressing";
    const XS = "http://www.w3.org/2001/XMLSchema";
    const WSDL = "http://schemas.xmlsoap.org/wsdl/";
    const SP = "http://docs.oasis-open.org/ws-sx/ws-securitypolicy/200702";

    /**
     * STS Properties
     */
    protected $stsHostName;
    protected $stsEndpoint;
    protected $stsUsername;
    protected $stsPassword;

    /**
     * RSTR Properties
     */
    protected $rstrKeySize;
    protected $rstrCreated;
    protected $rstrExpires;
    protected $rstrKeyInfoX509IssuerName;
    protected $rstrKeyInfoX509SerialNumber;
    protected $rstrKeyInfoCipherValue;
    protected $rstrCipherValue;
    protected $rstrBinarySecret;
    protected $rstrKeyIdentifier;

    function __construct($username, $password, $wsdl, array $options = array())
    {
        date_default_timezone_set("Europe/Istanbul");

        $this->setStsUsername($username);
        $this->setStsPassword($password);

        $wsdlXml = @file_get_contents($wsdl);

        if ($wsdlXml === false)
        {
            throw new Exception("Could not load WSDL.");
        }

        $wsdlDom = new DOMDocument("1.0", "utf-8");
        $wsdlDom->preserveWhiteSpace = false;
        $wsdlDom->loadXML($wsdlXml);

        $wsdlXpath = new DOMXPath($wsdlDom);
        $wsdlXpath->registerNamespace('WSDL', static::WSDL);
        $wsdlXpath->registerNamespace('WSA', static::WSA);
        $wsdlXpath->registerNamespace('WSP', static::WSP);
        $wsdlXpath->registerNamespace('SP', static::SP);

        $addressPath = $wsdlXpath->query("//WSDL:definitions/WSP:Policy/WSP:ExactlyOne/WSP:All/SP:EndorsingSupportingTokens/WSP:Policy/SP:IssuedToken/SP:Issuer/WSA:Address");

        if ($addressPath->length === 0)
        {
            throw new Exception("WSDL has no policy.");
        }

        $address = $addressPath->item(0)->nodeValue;

        $this->stsHostName = parse_url($address, PHP_URL_HOST);
        $this->stsEndpoint = $address;

        $wsdlData = sprintf("data://text/plain;base64,%s", base64_encode($wsdlXml));

        parent::__construct($wsdlData, array_merge($options, array('soap_version' => SOAP_1_2)));
    }

    function __doRequest($request, $location, $action, $version, $oneWay = 0)
    {

        $this->stsRequest($location);

        $kpsXml = base64_decode(static::KPS_TEMPLATE);

        $kpsDom = new DOMDocument("1.0", "utf-8");
        $kpsDom->preserveWhiteSpace = false;
        $kpsDom->loadXML($kpsXml);

        $kpsXpath = new DOMXPath($kpsDom);
        $kpsXpath->registerNamespace('S12', static::S12);
        $kpsXpath->registerNamespace('WSA', static::WSA);
        $kpsXpath->registerNamespace('WSU', static::WSU);
        $kpsXpath->registerNamespace('WSSE', static::WSSE);
        $kpsXpath->registerNamespace('XENC', static::XENC);
        $kpsXpath->registerNamespace('DS', static::DS);

        // Addressing

        $uuid = $this->uuid();

        $actionPath = $kpsXpath->query("//S12:Envelope/S12:Header/WSA:Action");
        $messageIDPath = $kpsXpath->query("//S12:Envelope/S12:Header/WSA:MessageID");
        $toPath = $kpsXpath->query("//S12:Envelope/S12:Header/WSA:To");

        $actionPath->item(0)->nodeValue = $action;
        $messageIDPath->item(0)->nodeValue = sprintf("urn:uuid:%s", $uuid);
        $toPath->item(0)->nodeValue = $location;

        // Timestamp

        $time = time();

        $dateCreated = gmdate('Y-m-d\TH:i:s\Z', $time);
        $dateExpires = gmdate('Y-m-d\TH:i:s\Z', $time + (5 * 60));

        $timestampPath = $kpsXpath->query("//S12:Envelope/S12:Header/WSSE:Security/WSU:Timestamp");
        $timestampDateCreatedPath = $kpsXpath->query("//S12:Envelope/S12:Header/WSSE:Security/WSU:Timestamp/WSU:Created");
        $timestampDateExpiresPath = $kpsXpath->query("//S12:Envelope/S12:Header/WSSE:Security/WSU:Timestamp/WSU:Expires");
        $timestampDateCreatedPath->item(0)->nodeValue = $dateCreated;
        $timestampDateExpiresPath->item(0)->nodeValue = $dateExpires;
        $timestampC14N = $timestampPath->item(0)->C14N(true, false);

        // DigestValue

        $digestValue = base64_encode(hash('sha1', $timestampC14N, true));

        // Issuer

        $keyInfoX509IssuerNamePath = $kpsXpath->query("//S12:Envelope/S12:Header/WSSE:Security/XENC:EncryptedData/DS:KeyInfo/XENC:EncryptedKey/DS:KeyInfo/WSSE:SecurityTokenReference/DS:X509Data/DS:X509IssuerSerial/DS:X509IssuerName");
        $keyInfoX509SerialNumberPath = $kpsXpath->query("//S12:Envelope/S12:Header/WSSE:Security/XENC:EncryptedData/DS:KeyInfo/XENC:EncryptedKey/DS:KeyInfo/WSSE:SecurityTokenReference/DS:X509Data/DS:X509IssuerSerial/DS:X509SerialNumber");
        $keyInfoCipherValuePath = $kpsXpath->query("//S12:Envelope/S12:Header/WSSE:Security/XENC:EncryptedData/DS:KeyInfo/XENC:EncryptedKey/XENC:CipherData/XENC:CipherValue");
        $cipherValuePath = $kpsXpath->query("//S12:Envelope/S12:Header/WSSE:Security/XENC:EncryptedData/XENC:CipherData/XENC:CipherValue");

        $keyInfoX509IssuerNamePath->item(0)->nodeValue = $this->rstrKeyInfoX509IssuerName;
        $keyInfoX509SerialNumberPath->item(0)->nodeValue = $this->rstrKeyInfoX509SerialNumber;
        $keyInfoCipherValuePath->item(0)->nodeValue = $this->rstrKeyInfoCipherValue;
        $cipherValuePath->item(0)->nodeValue = $this->rstrCipherValue;

        // DigestValue

        $digestValuePath = $kpsXpath->query("//S12:Envelope/S12:Header/WSSE:Security/DS:Signature/DS:SignedInfo/DS:Reference/DS:DigestValue");
        $digestValuePath->item(0)->nodeValue = $digestValue;

        // Signature

        $signaturePath = $kpsXpath->query("//S12:Envelope/S12:Header/WSSE:Security/DS:Signature/DS:SignedInfo");
        $signatureValuePath = $kpsXpath->query("//S12:Envelope/S12:Header/WSSE:Security/DS:Signature/DS:SignatureValue");

        $signatureC14N = $signaturePath->item(0)->C14N(true, false);
        $signatureValue = base64_encode(hash_hmac("sha1", $signatureC14N, $this->rstrBinarySecret, true));

        $signatureValuePath->item(0)->nodeValue = $signatureValue;

        // SAML Assertion

        $keyIdentifierPath = $kpsXpath->query("//S12:Envelope/S12:Header/WSSE:Security/DS:Signature/DS:KeyInfo/WSSE:SecurityTokenReference/WSSE:KeyIdentifier");
        $keyIdentifierPath->item(0)->nodeValue = $this->rstrKeyIdentifier;

        // Message

        $domRequest = new DOMDocument("1.0", "utf-8");
        $domRequest->preserveWhiteSpace = false;
        $domRequest->loadXML($request);

        $xpathRequest = new DOMXPath($domRequest);

        $xpathRequest->registerNamespace('S12', static::S12);

        $bodyPath = $xpathRequest->query("//S12:Envelope/S12:Body");
        $bodyItem = $bodyPath->item(0);
        $bodyElement = $kpsDom->importNode($bodyItem, true);

        $kpsDom->documentElement->appendChild($bodyElement);

        $kpsRequest = $kpsDom->saveXML();

        return parent::__doRequest($kpsRequest, $location, $action, $version, $oneWay);
    }

    /**
     * Set STS username
     * 
     * @param string $username API user
     */
    public function setStsUsername($username)
    {
        $this->stsUsername = $username;
    }

    /**
     * Returns STS username
     * 
     * @return string STS username
     */
    public function getStsUsername()
    {
        return $this->stsUsername;
    }

    /**
     * Set STS password
     * 
     * @param string $password API password
     */
    public function setStsPassword($password)
    {
        $this->stsPassword = $password;
    }

    /**
     * Returns STS password
     * 
     * @return string STS password
     */
    public function getStsPassword()
    {
        return $this->stsPassword;
    }

    /**
     * Returns STS endpoint
     * 
     * @return string STS endpoint
     */
    public function getStsEndpoint()
    {
        return $this->stsEndpoint;
    }

    /**
     * Performs a STS request
     * 
     * @param string $location Request location
     */
    protected function stsRequest($location)
    {

        $rstXml = base64_decode(static::STS_TEMPLATE);

        $rstDom = new DOMDocument("1.0", "utf-8");
        $rstDom->preserveWhiteSpace = false;
        $rstDom->loadXML($rstXml);

        $rstXpath = new DOMXPath($rstDom);
        $rstXpath->registerNamespace('S12', static::S12);
        $rstXpath->registerNamespace('WSA', static::WSA);
        $rstXpath->registerNamespace('WSU', static::WSU);
        $rstXpath->registerNamespace('WSSE', static::WSSE);
        $rstXpath->registerNamespace('XENC', static::XENC);
        $rstXpath->registerNamespace('DS', static::DS);
        $rstXpath->registerNamespace('WST', static::WST);
        $rstXpath->registerNamespace('WSP', static::WSP);

        // Addressing

        $uuid = $this->uuid();

        $messageIDPath = $rstXpath->query("//S12:Envelope/S12:Header/WSA:MessageID");
        $toPath = $rstXpath->query("//S12:Envelope/S12:Header/WSA:To");

        $messageIDPath->item(0)->nodeValue = sprintf("urn:uuid:%s", $uuid);
        $toPath->item(0)->nodeValue = $this->stsEndpoint;

        // Timestamp

        $time = time();

        $dateCreated = gmdate('Y-m-d\TH:i:s\Z', $time);
        $dateExpires = gmdate('Y-m-d\TH:i:s\Z', $time + (10 * 60));

        $timestampDateCreatedPath = $rstXpath->query("//S12:Envelope/S12:Header/WSSE:Security/WSU:Timestamp/WSU:Created");
        $timestampDateExpiresPath = $rstXpath->query("//S12:Envelope/S12:Header/WSSE:Security/WSU:Timestamp/WSU:Expires");
        $timestampDateCreatedPath->item(0)->nodeValue = $dateCreated;
        $timestampDateExpiresPath->item(0)->nodeValue = $dateExpires;

        // Credentials

        $usernamePath = $rstXpath->query("//S12:Envelope/S12:Header/WSSE:Security/WSSE:UsernameToken/WSSE:Username");
        $passwordPath = $rstXpath->query("//S12:Envelope/S12:Header/WSSE:Security/WSSE:UsernameToken/WSSE:Password");

        $usernamePath->item(0)->nodeValue = $this->stsUsername;
        $passwordPath->item(0)->nodeValue = $this->stsPassword;

        // Endpoint

        $addressPath = $rstXpath->query("//S12:Envelope/S12:Body/WST:RequestSecurityToken/WSP:AppliesTo/WSA:EndpointReference/WSA:Address");
        $addressPath->item(0)->nodeValue = $location;

        $stsRequest = $rstDom->saveXML();

        // Request

        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, $this->stsEndpoint);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, true);
        curl_setopt($ch, CURLOPT_CAINFO, getcwd() . DIRECTORY_SEPARATOR . "cert.pem");
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            "Host: " . $this->stsHostName,
            "Content-Type: application/soap+xml; charset=utf-8",
            "Content-Length: " . strlen($stsRequest),
        ));
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $stsRequest);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        $stsResponse = curl_exec($ch);

        if ($stsResponse === false)
        {
            throw new Exception(curl_error($ch));
        }

        curl_close($ch);

        $rstrDom = new DOMDocument("1.0", "utf-8");
        $rstrDom->preserveWhiteSpace = false;
        $rstrDom->loadXML($stsResponse);

        $rstrXpath = new DOMXPath($rstrDom);

        $rstrXpath->registerNamespace('S12', static::S12);
        $rstrXpath->registerNamespace('WSA', static::WSA);
        $rstrXpath->registerNamespace('WSU', static::WSU);
        $rstrXpath->registerNamespace('WSSE', static::WSSE);
        $rstrXpath->registerNamespace('XENC', static::XENC);
        $rstrXpath->registerNamespace('DS', static::DS);
        $rstrXpath->registerNamespace('WST', static::WST);
        $rstrXpath->registerNamespace('WSP', static::WSP);

        $keySizePath = $rstrXpath->query("//S12:Envelope/S12:Body/WST:RequestSecurityTokenResponseCollection/WST:RequestSecurityTokenResponse/WST:KeySize");
        $createdPath = $rstrXpath->query("//S12:Envelope/S12:Body/WST:RequestSecurityTokenResponseCollection/WST:RequestSecurityTokenResponse/WST:Lifetime/WSU:Created");
        $expiresPath = $rstrXpath->query("//S12:Envelope/S12:Body/WST:RequestSecurityTokenResponseCollection/WST:RequestSecurityTokenResponse/WST:Lifetime/WSU:Expires");
        $endpointPath = $rstrXpath->query("//S12:Envelope/S12:Body/WST:RequestSecurityTokenResponseCollection/WST:RequestSecurityTokenResponse/WSP:AppliesTo/WSA:EndpointReference/WSA:Address");
        $keyInfoX509IssuerNamePath = $rstrXpath->query("//S12:Envelope/S12:Body/WST:RequestSecurityTokenResponseCollection/WST:RequestSecurityTokenResponse/WST:RequestedSecurityToken/XENC:EncryptedData/DS:KeyInfo/XENC:EncryptedKey/DS:KeyInfo/WSSE:SecurityTokenReference/DS:X509Data/DS:X509IssuerSerial/DS:X509IssuerName");
        $keyInfoX509SerialNumberPath = $rstrXpath->query("//S12:Envelope/S12:Body/WST:RequestSecurityTokenResponseCollection/WST:RequestSecurityTokenResponse/WST:RequestedSecurityToken/XENC:EncryptedData/DS:KeyInfo/XENC:EncryptedKey/DS:KeyInfo/WSSE:SecurityTokenReference/DS:X509Data/DS:X509IssuerSerial/DS:X509SerialNumber");
        $keyInfoCipherValuePath = $rstrXpath->query("//S12:Envelope/S12:Body/WST:RequestSecurityTokenResponseCollection/WST:RequestSecurityTokenResponse/WST:RequestedSecurityToken/XENC:EncryptedData/DS:KeyInfo/XENC:EncryptedKey/XENC:CipherData/XENC:CipherValue");
        $cipherValuePath = $rstrXpath->query("//S12:Envelope/S12:Body/WST:RequestSecurityTokenResponseCollection/WST:RequestSecurityTokenResponse/WST:RequestedSecurityToken/XENC:EncryptedData/XENC:CipherData/XENC:CipherValue");
        $binarySecretPath = $rstrXpath->query("//S12:Envelope/S12:Body/WST:RequestSecurityTokenResponseCollection/WST:RequestSecurityTokenResponse/WST:RequestedProofToken/WST:BinarySecret");
        $keyIdentifierPath = $rstrXpath->query("//S12:Envelope/S12:Body/WST:RequestSecurityTokenResponseCollection/WST:RequestSecurityTokenResponse/WST:RequestedUnattachedReference/WSSE:SecurityTokenReference/WSSE:KeyIdentifier");

        $this->rstrKeySize = $keySizePath->item(0)->nodeValue;
        $this->rstrCreated = $createdPath->item(0)->nodeValue;
        $this->rstrExpires = $expiresPath->item(0)->nodeValue;
        $this->rstrEndpoint = $endpointPath->item(0)->nodeValue;
        $this->rstrKeyInfoX509IssuerName = $keyInfoX509IssuerNamePath->item(0)->nodeValue;
        $this->rstrKeyInfoX509SerialNumber = $keyInfoX509SerialNumberPath->item(0)->nodeValue;
        $this->rstrKeyInfoCipherValue = $keyInfoCipherValuePath->item(0)->nodeValue;
        $this->rstrCipherValue = $cipherValuePath->item(0)->nodeValue;
        $this->rstrBinarySecret = base64_decode($binarySecretPath->item(0)->nodeValue);
        $this->rstrKeyIdentifier = $keyIdentifierPath->item(0)->nodeValue;
    }

    /**
     * Generates UUID
     * 
     * @return string UUID
     */
    protected function uuid()
    {
        return sprintf('%04x%04x-%04x-%04x-%04x-%04x%04x%04x', //
                mt_rand(0, 0xffff), //
                mt_rand(0, 0xffff), //
                mt_rand(0, 0xffff), //
                mt_rand(0, 0x0fff) | 0x4000, //
                mt_rand(0, 0x3fff) | 0x8000, //
                mt_rand(0, 0xffff), //
                mt_rand(0, 0xffff), //
                mt_rand(0, 0xffff) //
        );
    }

}